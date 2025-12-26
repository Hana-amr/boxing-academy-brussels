<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserProfileController extends Controller
{
    public function index()
    {
        $users = User::with('profile')->get();
        return view('profiles.index', compact('users'));
    }

    public function show(User $user)
    {
        $user->load('profile');
        return view('profiles.show', compact('user'));
    }
}
