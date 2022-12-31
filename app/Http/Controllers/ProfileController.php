<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->pageTitle = 'Profile';
    }

    public function index()
    {
        $user = User::find(Auth::id());
        return view('profile', ['user' => $user, 'title' => $this->pageTitle])->with('user', $user);
    }

    public function update(ProfileRequest $request)
    {
        $user = Auth::user();

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect(route('profile'))->with('message', 'Profile Updated!')->with('alert_type', 'alert-success');
    }
}
