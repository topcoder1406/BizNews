<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => [ 'required', 'string', 'max:255', 'unique:users' ],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('admin.' . config('admin.homepage')));
    }

    public function changePassword(Request $request) {
        if (Gate::denies('change-password', $request->password)) {
            return back()->withErrors([
                'password' => 'Wrong password'
            ]);
        }

        if ($request->password == $request->new_password) {
            return back()->withErrors([
                'new_password' => 'New password should be different than current one.'
            ]);
        }

        $data = $request->validate([
            'password' => 'required',
            'new_password' => [ 'required', Rules\Password::defaults() ],
            'new_password_confirmation' => 'same:new_password'
        ]);

        User::find(auth()->id())->update([
            'password' => Hash::make($data['new_password'])
        ]);

        return back()->with('success', [ 'Password', 'updated.' ]);
    }
}
