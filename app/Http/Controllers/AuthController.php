<?php

namespace App\Http\Controllers;

use App\Mail\AdminNewUserNotification;
use App\Mail\NewUserRegistration;
use App\Mail\registrationEmail;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);



        $user = User::where('username', $request->username)->orWhere('email', $request->username)->where('status', 1)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Invalid credentials');
        }



        // Check if the password matches
        if (Hash::check($request->password, $user->password)) {
            $role = $user->role; // 'admin', 'customer', or 'subscriber'
            Auth::guard($role)->login($user);

            // checkout session variable
            $checkoutData = session('checkout_data');
            // Redirect based on the user's role
            if ($role == 'admin') {
                return redirect()->route('welcome');
            } else {


                if ($checkoutData) {

                    return redirect()->back()->with('success', 'Your checkout is ready.');
                }

                return redirect()->route('shop-now')->with('success', 'Login successful!');
            }
        }
        // If the password does not match, redirect back with an error message
        else {
            return redirect()->back()->with('error', 'Invalid credentials');
        }
    }


    //register
    public function register(Request $request)
    {
        try {
            // dd($request->all());
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'username' => 'required|string|max:255|unique:users',
                'password' => 'required|string|min:8',
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'username' => $request->username,
                'role' => 'customer', // Default role, can be changed as needed
                'password' => Hash::make($request->password),
            ]);

            Mail::to($request->email)->send(new NewUserRegistration($user));
            Mail::to('lawalsherifoyetola@gmail.com')->send(new AdminNewUserNotification($user));

            $guard = $user->role; // 'admin', 'customer', or 'subscriber'
            $checkoutData = session('checkout_data'); //checkout session variable
            Auth::guard($guard)->login($user);
            if ($checkoutData) {
                return redirect()->back()->with('success', 'Your checkout is ready.');
            } else {
                return redirect()->route('shop-now')->with('success', 'Registration successful!');
            }
        } catch (Exception $e) {
            Log::error('error in connnection: ' . $e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'request' => $request->all()
            ]);
            // Handle the exception, log it, or return an error response
            return redirect()->back()->with('error', 'Registration failed. Please try again later.');
        }
    }

    public function logout(Request $request)
    {

        //  Auth::guard('web')->logout();
        Auth::guard('admin')->logout();
        Auth::guard('customer')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
