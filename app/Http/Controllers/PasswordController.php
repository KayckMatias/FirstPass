<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

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
        $passwords = Password::where('user_id', Auth::id())->paginate(10);
        return view('passwords.index', ['passwords' => $passwords, 'title' => $this->pageTitle]);
    }

    public function search(Request $request)
    {
        $search = $request->search_passwords;
        $passwords = Password::query()
            ->whereHas('category', function($query) use ($search) {
                $query->where('category_name', 'LIKE', "%$search%");
            })
            ->orWhere('password_name', 'LIKE', "%$search%")
            ->paginate(10);
        return view('passwords.index', ['search' => $search, 'passwords' => $passwords, 'title' => $this->pageTitle]);
    }

    public function showValidate($id)
    {
        return view('passwords.validate', ['password_id' => $id, 'title' => $this->pageTitle]);
    }

    public function verifyPassword(Request $request)
    {
        $password_db = Password::find($request->password_id);

        if (Auth::id() != $password_db->user_id) { // Verify if User logged is same of user DB
            return $this->redirectOnNoPermission('categories.index');
        }

        return $this->validatePassword($request->password_id, $request->pin_password);
    }

    private function validatePassword($id, $request_password)
    {
        
            $password_db = Password::find($id);
            if (Hash::check($request_password, $password_db->user->pin_password)) {
                $decrypted = Crypt::decrypt($password_db->password_pass);
                return view('passwords.show', ['password' => $password_db, 'decrypted' => $decrypted, 'title' => $this->pageTitle]);
            }

            return redirect(route('passwords.validate', $id))->with('message', 'Error: Wrong PIN!')->with('alert_type', 'alert-danger');
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge([
            'user_id' => Auth::id(),
            'password_pass' => Crypt::encrypt($request->password_pass),
        ]);

        $input = $request->all();

        Password::create($input);
        return redirect(route('passwords.index'))->with('message', 'Password Added!')->with('alert_type', 'alert-success');
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
        $categories = Category::all();
        return view('passwords.edit', ['password' => $password, 'categories' => $categories, 'title' => $this->pageTitle]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $password = Password::find($request->id);
        $input = $request->all();

        if (Auth::id() != $password->user_id) { // Verify if User logged is same of user DB
            return $this->redirectOnNoPermission('passwords.index');
        }

        $password->update($input);
        return redirect(route('passwords.index'))->with('message', 'Password Updated')->with('alert_type', 'alert-success');
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
        return redirect(route('passwords.index'))->with('message', 'Password Deleted!')->with('alert_type', 'alert-warning');
    }
}
