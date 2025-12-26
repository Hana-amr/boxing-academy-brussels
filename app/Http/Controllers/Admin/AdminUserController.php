<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function toggleAdmin(User $user)
    {
        $user->update([
            'is_admin' => !$user->is_admin
        ]);

        return back();
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'is_admin' => 'nullable',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'is_admin' => isset($validated['is_admin']),
        ]);

        return redirect()->route('admin.users.index')
            ->with('success', 'Gebruiker aangemaakt.');
    }
    public function destroy(User $user)
    {
        // Admin mag zichzelf niet verwijderen
        if ($user->id === auth()->id()) {
            return back()->with('error', 'Je kan jezelf niet verwijderen.');
        }

        $user->delete();

        return back()->with('success', 'Gebruiker verwijderd.');
    }

}
