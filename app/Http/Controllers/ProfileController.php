<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
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
        $user = $request->user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'birthday' => 'nullable|date',
            'about' => 'nullable|string|max:1000',
            'photo' => 'nullable|image|max:2048',
        ]);

        // Update username
        $user->update([
            'name' => $validated['name'],
        ]);

        // Profiel aanmaken indien nodig
        $profile = $user->profile()->firstOrCreate([]);

        // Foto upload
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('profiles', 'public');
            $profile->photo = $path;
        }

        $profile->birthday = $validated['birthday'] ?? null;
        $profile->about = $validated['about'] ?? null;
        $profile->save();

        return back()->with('success', 'Profiel succesvol bijgewerkt.');
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
}
