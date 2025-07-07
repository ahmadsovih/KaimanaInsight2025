<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Menampilkan semua user kecuali user yang sedang login
    public function updateAccess()
    {
        $users = User::where('email', '!=', Auth::user()->email)->get();
        return view('layouts.update-access', compact('users'));
    }

    // Update role atau status secara inline
    public function updateAccessInline(Request $request, User $user)
    {
        if ($request->has('isAccepted')) {
            $user->isAccepted = $request->input('isAccepted');
        }

        if ($request->has('isAdmin')) {
            $user->isAdmin = $request->input('isAdmin');
        }

        $user->save();

        return redirect()->back()->with('status', 'Data berhasil diperbarui!');
    }
}
