<?php

namespace App\Http\Controllers\Auth;

use App\Models\Log;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller {
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create() {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request) {
        $request->authenticate();

        $request->session()->regenerate();

        Log::create([
            'table' => app(User::class)->getTable(),
            'student_id' => $request->user()->id,
            'description' => 'User id:' . $request->user()->id . ' logged in',
            'ip' => request()->ip()
        ]);

        if (auth()->user()->hasRole('admin')) {
            return redirect()->route('admin.index');
        }

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request) {
        Log::create([
            'table' => app(User::class)->getTable(),
            'student_id' => $request->user()->id,
            'description' => 'User id:' . $request->user()->id . ' logged out',
            'ip' => request()->ip()
        ]);

        Auth::guard('web')->logout();

        $request->session()->invalidate();


        $request->session()->regenerateToken();

        return redirect('/');
    }
}
