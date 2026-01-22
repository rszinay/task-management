<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function login(Request $request)
    {
         $data = $request->validate([
             'name' => 'required',
             'password' => 'required',
         ]);

         if(auth()->attempt(['name' => $data['name'], 'password' => $data['password']])) {
             request()->session()->regenerate();
         }

         return redirect('/');
    }
    public function showRegisterUserForm()
    {
        return view('users.register-user');
    }
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'min:3', Rule::unique('users', 'name')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|min:8',
        ]);

        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);

        auth()->login($user);

        return redirect('/');
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}
