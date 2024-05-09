<?php

namespace App\Http\Controllers\Auth;

use App\Models\HistoryPoint;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // check + login
        $request->authenticate();
        $request->session()->regenerate();
        
        // add record
        HistoryPoint::create([
            'user_id'=> auth()->user()->id, 
            'details'=> "User logged in from {$request->ip()}.",
        ]);

        return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $uid = auth()->user()->id;

        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        HistoryPoint::create([
            'user_id'=> $uid, 
            'details'=> 'User logged out.',
        ]);

        return redirect('/');
    }
}
