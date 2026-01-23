<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Login with validation of users credential from the login form
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
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

    /**
     * Show form to register new user
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showRegisterUserForm()
    {
        return view('users.register-user');
    }

    /**
     * Save new user from registration form
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
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

    /**
     * Log out the user from the application
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}
