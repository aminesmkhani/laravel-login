<?php

namespace App\Http\Controllers\auth;

use App\Events\UserRegistered;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }


    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        # validate
        $this->validateForm($request);
        # store user
        $user = $this->create($request->all());
        #login
        Auth::login($user);
        #redirect

        event(new UserRegistered($user));
        return redirect()->route('home')->with('registred',true);
    }

    protected function validateForm(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone_number' => ['required','numeric', 'digits:11', 'nullable']
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
           'name'  => $data['name'],
           'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone_number' => $data['phone_number']
        ]);
    }
}
