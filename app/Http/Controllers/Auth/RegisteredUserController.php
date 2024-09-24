<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Alamat;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // dd($request->all());
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'username' => ['required', 'string', 'lowercase', 'max:30'],
            'wa_number' => ['required', 'numeric'],
            'password' => ['required', 'confirmed'],
            'password_confirmation' => ['required'],
        ]);

        if($request->password === $request->password_confirmation){
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'username' => $request->username,
                'wa_number' => $request->wa_number,
                'password' => Hash::make($request->password),
            ]);
            $alamat = Alamat::create([
                'user_id' => $user->id,
                'dusun' => '-',
                'desa' => '-',
                'kecamatan' => '-',
                'kabupaten' => '-'
            ]);
            event(new Registered($user));
            Auth::login($user);
            return redirect(route('home', absolute: false))->with('succes', 'Daftar berhasil!');
        }else{
            return redirect(route('home', absolute: false))->with('error', 'Daftar gagal, cek kembali data yang anda masukkan!');
        }
    }
}
