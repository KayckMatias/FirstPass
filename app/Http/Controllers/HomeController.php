<?php

namespace App\Http\Controllers;

use App\Models\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\PasswordController;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->pageTitle = 'Home';
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $favorite_passwords = Password::where('user_id', Auth::id())
            ->where('is_favorite', 1)
            ->paginate(10)
            ->through(function ($query) {
                $query->password_login = PasswordController::formatLogin(Crypt::decrypt($query->password_login));
                return $query;
            });

        return view('home', ['favorite_passwords' => $favorite_passwords, 'title' => $this->pageTitle]);
    }
}
