<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    public function index(User $user)
    {
        return view('dashboard.profile',[
            'title' => 'User Profile',
            'user' => $user
        ]);
    }
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);

        $validData = $request->validate([
            'name' => ['string', 'max:255'],
            'email' => ['string', 'lowercase', 'email', 'max:255'],
            'username' => ['string', 'lowercase', 'max:30'],
            'wa_number' => ['numeric'],
        ]);

        if($request->hasFile('avatar')){
            // store Avatar
            $validData['avatar'] = $request->file('avatar')->store('avatars');
            Storage::delete($user->avatar);
            $user->update($validData, [
                'avatar' => $validData['avatar']
            ]);
        }elseif($request->hasFile('banner')){
            // store image
            $validData['banner'] = $request->file('banner')->store('banners');
            Storage::delete($user->banner);
            $user->update($validData, [
                'banner' => $validData['banner']
            ]);
        }else {
            $user->update($validData);
        }


        return back()->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function show(User $user){
        $data_user = $user;
        return view('card-profile', [
            'title' => 'Profil',
            'user' => $data_user
        ]);
    }
}
