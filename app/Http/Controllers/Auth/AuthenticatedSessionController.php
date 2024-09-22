<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\LoginRequest;

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
        // dd($request->all());
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('home', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Anda berhasil logout!');
    }

    public function makeAdmin(User $user): RedirectResponse
    {
        if($user->role_id == 1){
            return redirect()->back()->with('warning', 'Pengguna adalah Admin!');
        }else{
            $user->update([
                'role_id' => 1
            ]);
            $user->save();
            return redirect()->back()->with('success', 'Pengguna berhasil dijadikan Admin!');
        }
    }

    public function makeSeller(User $user): RedirectResponse
    {
        if($user->role_id == 2){
            return redirect()->back()->with('warning', 'Pengguna adalah Seller!');
        }else{
            $user->update([
                'role_id' => 2
            ]);
            $user->save();
            return redirect()->back()->with('success', 'Pengguna berhasil dijadikan Seller!');
        }
    }

    public function makeUser(User $user): RedirectResponse
    {
        if($user->role_id == 3){
            return redirect()->back()->with('warning', 'Pengguna adalah User!');
        }else{
            $user->update([
                'role_id' => 3
            ]);
            $user->save();
            return redirect()->back()->with('success', 'Pengguna berhasil dijadikan User!');
        }
    }
}
