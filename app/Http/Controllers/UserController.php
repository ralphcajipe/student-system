<?php

namespace App\Http\Controllers;

use App\Models\User;
#use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    // index
    public function index()
    {
        return 'Hello from UserController';
    }

    // login
    public function login()
    {
        if (View::exists('user.login')) {
            return view('user.login');
        } else {
            // return response()->view('errors.404');
            return abort(404);
        }
    }

    // process
    public function process(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if (auth()->attempt($validated)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'Welcome back!');
        }

        //return if login failed
        return back()->withErrors([
            'email' => 'Login failed',
        ])->onlyInput('email');
    }

    // register
    public function register()
    {
        return view('user.register');
    }

    // logout
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('message', 'Logout successful');
    }

    // store
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'min:4'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);

        $validated['password'] = bcrypt($validated['password']);

        $user = User::create($validated);

        auth()->login($user);

        return redirect('/')->with('message', 'Registration successful');
    }

    // show
    public function show($id)
    {
        $data = ["data" => "data from database"];
        return view('user')
            ->with('data', $data)
            ->with('name', 'Ralph Cajipe')
            ->with('age', '23')
            ->with('email', 'ralphcajipe@gmail.com')
            ->with('id', $id);
    }
}
