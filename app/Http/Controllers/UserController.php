<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //

        $users = User::join('genders', 'users.gender_id', '=', 'genders.gender_id')
        ->orderBy('users.first_name');

        return view('admin.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }

    public function login() {
        return view('index');
    }

    public function processLogin(Request $request, $role) {
        $validated = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        $user = User::join('genders', 'users.gender_id', '=', 'genders.gender_id')
            ->where('username', $validated['username'])
            ->first();

        if($user && auth()->attempt($validated)) {
            if($user->role_id == $role) {
                auth()->login($user);
                $request->session()->regenerate();
                return redirect('/' . ($role == 1 ? 'admin' : 'cashier'));
            } else {
                return back()->with('message_error', 'Your role does not have access to this system.');
            }
        } else {
            return back()->with('message_error', 'The provided credentials do not match our records.');
        }
    }
}