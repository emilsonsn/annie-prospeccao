<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.users', compact('users'));
    }
    
    public function block(User $user)
    {
        $user->update(['blocked' => !$user->blocked]); // ou outro campo que você tenha
        return back();
    }

    public function create()
    {
        return view('users.form');
    }
    
    public function edit(User $user)
    {
        return view('users.form', compact('user'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'nullable|string|max:20',
            'role' => 'required|string',
            'password' => 'required|confirmed|min:6',
        ]);
    
        $validated['password'] = bcrypt($validated['password']);
        $validated['blocked'] = false;
    
        User::create($validated);
    
        return redirect()->route('users')->with('success', 'Usuário criado com sucesso.');
    }
    
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'role' => 'required|string',
        ]);
    
        $user->update($validated);
    
        return redirect()->route('users')->with('success', 'Usuário atualizado com sucesso.');
    }    
    
}
