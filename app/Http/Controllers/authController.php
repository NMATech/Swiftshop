<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class authController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fname = $request->input('fname');
        $lname = $request->input('lname');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $password = $request->input('password');
        $confirm_password = $request->input('confirm_password');

        // Initialize an empty array for errors
        $errors = [];

        // Check if the email or phone already exists
        $checkEmail = Users::where('email', $email)->exists();
        $checkPhone = Users::where('phone', $phone)->exists();

        if ($checkEmail) {
            $errors['email'] = 'Email is already registered.';
        }

        if ($checkPhone) {
            $errors['phone'] = 'Phone Number is already registered.';
        }

        // Check if password and confirm_password match
        if ($password !== $confirm_password) {
            $errors['confirm_password'] = "Password and Confirm Password doesn't match.";
        }

        // Check if password length is at least 8 characters
        if (strlen($password) < 8) {
            $errors['password'] = 'Password should be at least 8 character.';
        }

        // If there are any errors, redirect back with errors and input
        if (!empty($errors)) {
            return redirect()->back()->withErrors($errors)->withInput();
        }

        $users = new Users([
            'fname' => $fname,
            'lname' => $lname,
            'email' => $email,
            'phone' => $phone,
            'password' => Hash::make($password),
        ]);

        $users->save();
    }

    public function login(Request $request)
    {
        // Validate input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        $credentials = $request->only('email', 'password');

        // Attempt to login
        if (Auth::attempt($credentials)) {
            // If login successful, regenerate session
            $request->session()->regenerate();
            $user = Auth::user();

            return view('pages.home', ['user' => $user]);
        }

        // If login fails, redirect back with error
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'You are logged out!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
