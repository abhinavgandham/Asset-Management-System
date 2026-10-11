<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

/**
 * Controller for handling user registration.
 */
class RegisteredUserController extends Controller
{
    /**
     * Show the registration form.
     *
     * @return View
     */
    public function create(): View
    {
        return view('register');
    }

    /**
     * Register the new user and log them in.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $validateddata = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = User::create($validateddata);
        Auth::login($user);

        $request->session()->regenerate();

        return redirect()->route('register')->with('success', 'Registration successful! You can now login.');
    }
}