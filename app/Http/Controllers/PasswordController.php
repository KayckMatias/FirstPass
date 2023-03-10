<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordRequest;
use App\Models\Category;
use App\Models\Password;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PasswordController extends Controller
{
    public function __construct()
    {
        $this->pageTitle = "Passwords";
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $passwords = Password::where('user_id', Auth::id())->paginate(10)->through(function ($query) {
            if ($query->password_login) {
                $query->password_login = $this->formatLogin(Crypt::decrypt($query->password_login));
            }
            return $query;
        });

        $categories = Category::where('user_id', Auth::id())->get();

        return view('passwords.index', ['passwords' => $passwords, 'categories' => $categories, 'title' => $this->pageTitle]);
    }

    static public function formatLogin($login)
    {
        $prefix = '';
        if (preg_match('/^[\w\.]+@([\w-]+\.)+[\w-]{2,4}$/', $login)) {
            $prefix = "@" . Str::of($login)->after('@');
            $login = Str::of($login)->before('@');
        }

        $size_for_format = round(strlen($login) / 2);

        $replace = '';
        for ($i = 0; $i < $size_for_format; $i++) {
            $replace .= '*';
        }

        $finally = Str::of($login)->substrReplace($replace, $size_for_format) . $prefix;

        return $finally;
    }

    public function search(Request $request)
    {
        $filter_search = $request->search_passwords;
        $filter_category = $request->category_id;
        $passwords = Password::query()
            ->when($filter_category, function ($q) use ($filter_category) {
                $q->where('category_id', $filter_category);
            })
            ->when($filter_search, function ($q) use ($filter_search) {
                $q->whereHas('category', function ($q) use ($filter_search) { 
                    $q->where('password_name', 'LIKE', "%$filter_search%");
                    $q->orWhere('category_name', 'LIKE', "%$filter_search%");
                });
            })
            ->where('user_id', Auth::id())
            ->paginate(10)
            ->through(function ($query) {
                if ($query->password_login) {
                    $query->password_login = $this->formatLogin(Crypt::decrypt($query->password_login));
                }
                return $query;
            });

        $categories = Category::where('user_id', Auth::id())->get();

        return view('passwords.index', ['filter_search' => $filter_search, 'filter_category' => $filter_category, 'passwords' => $passwords, 'categories' => $categories, 'title' => $this->pageTitle]);
    }

    public function checkNeedPin($id){
        $password_db = Password::find($id);

        if (Auth::id() != $password_db->user_id) { // Verify if User logged is same of user DB
            return $this->redirectOnNoPermission('passwords.index');
        }

        if($password_db->need_pin == 0){
            $decrypted_login = Crypt::decrypt($password_db->password_login);
            $decrypted_pass = Crypt::decrypt($password_db->password_pass);
            return view('passwords.show', ['password' => $password_db, 'decrypted_login' => $decrypted_login, 'decrypted_pass' => $decrypted_pass, 'title' => $this->pageTitle]);
        }

        return view('passwords.validate', ['password_id' => $id, 'title' => $this->pageTitle]);
    }

    public function verifyPassword(Request $request)
    {
        $password_db = Password::find($request->password_id);

        if (Auth::id() != $password_db->user_id) { // Verify if User logged is same of user DB
            return $this->redirectOnNoPermission('passwords.index');
        }

        return $this->validatePassword($password_db, $request->pin_password);
    }

    private function validatePassword($password_db, $request_password)
    {
        $user_db = User::find(Auth::id());

        if (Hash::check($request_password, $user_db->pin_password)) {
            $decrypted_login = Crypt::decrypt($password_db->password_login);
            $decrypted_pass = Crypt::decrypt($password_db->password_pass);
            return view('passwords.show', ['password' => $password_db, 'decrypted_login' => $decrypted_login, 'decrypted_pass' => $decrypted_pass, 'title' => $this->pageTitle]);
        }

        return redirect(route('passwords.validate', $password_db->id))->with('message', 'Error: Wrong PIN!')->with('alert_type', 'custom-alert-danger');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('user_id', Auth::id())->get();
        return view('passwords.create', ['categories' => $categories, 'title' => $this->pageTitle]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\PasswordRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PasswordRequest $request)
    {
        $request->merge([
            'user_id' => Auth::id(),
            'password_login' => Crypt::encrypt($request->password_login),
            'password_pass' => Crypt::encrypt($request->password_pass),
        ]);

        $input = $request->all();

        Password::create($input);
        return redirect(route('passwords.index'))->with('message', 'Password Added!')->with('alert_type', 'custom-alert-success');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $password = Password::find($id);

        if (Auth::id() != $password->user_id) { // Verify if User logged is same of user DB
            return $this->redirectOnNoPermission('passwords.index');
        }

        $password->password_login = Crypt::decrypt($password->password_login);
        $categories = Category::where('user_id', Auth::id())->get();
        return view('passwords.edit', ['password' => $password, 'categories' => $categories, 'title' => $this->pageTitle]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PasswordRequest $request, $id)
    {
        $password = Password::find($id);

        $is_favorite = $request->is_favorite == '1' ? 1 : 0;

        $request->merge([
            'password_login' => Crypt::encrypt($request->password_login),
            'is_favorite' => $is_favorite,
        ]);

        $input = $request->all();
        
        if (Auth::id() != $password->user_id) { // Verify if User logged is same of user DB
            return $this->redirectOnNoPermission('passwords.index');
        }

        $password->update($input);
        return redirect(route('passwords.index'))->with('message', 'Password Updated')->with('alert_type', 'custom-alert-success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $password = Password::find($id);

        if (Auth::id() != $password->user_id) { // Verify if User logged is same of user DB
            return $this->redirectOnNoPermission('passwords.index');
        }

        Password::destroy($id);
        return redirect(route('passwords.index'))->with('message', 'Password Deleted!')->with('alert_type', 'custom-alert-warning');
    }
}
