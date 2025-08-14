<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    public function create(): View
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string'
        ]);

        $user = User::where('email', $request->username)->first();

        if (!$user) {
            return back()->withErrors([
                'username' => 'No user found'
            ])->withInput();
        }
        $request->session()->put('username', $user->username);
        $request->session()->put('email', $user->email);
        return redirect()->route('pin')->with('success', $user->name);;
    }

    public function showPin(Request $request)
    {
        if (empty($request->session()->get('email'))) {
            return redirect()->route('login');
        }
        return view('auth.pin');
    }

    public function verifyPin(Request $request)
    {
        if (Auth::attempt(['email' => $request->session()->get('email'), 'password' => $request->input('pin')])) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        return back()->withErrors([
            'pin' => 'Wrong Number Pin',
        ])->onlyInput('pin');
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
