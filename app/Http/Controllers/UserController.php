<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
public function register(Request $request)
{
    $validatedData = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'number' => 'required|numeric',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'role' => 'required|in:registered,admin' // add validation for role
    ]);

    // Check if the user is trying to register as an admin
if ($validatedData['role'] === 'admin') {
    // Check if the secret password is correct
    $secret_password = $request->input('admin_password');
    if ($secret_password !== env('ADMIN_PASSWORD')) {
        return redirect()->back()->withErrors(['admin_password' => 'Incorrect admin password.'])->withInput();
    }
}
    // Create a new user model
    $user = User::create([
        'first_name' => $validatedData['first_name'],
        'last_name' => $validatedData['last_name'],
        'number' => $validatedData['number'],
        'email' => $validatedData['email'],
        'password' => bcrypt($validatedData['password']),
    ]);

    // Assign role based on user selection
    $role = Role::where('name', $validatedData['role'])->first();
    $user->assignRole($role);

    return redirect('/auth/login')->with('success', 'User created successfully!');
}

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function profile()
    {
        $user = Auth::user();
        return view('user.profile', compact('user'));
    }
public function updateProfile(Request $request)
{
    $user = Auth::user();

    $validatedData = $request->validate([
        'first_name' => ['required', 'string', 'max:255'],
        'last_name' => ['required', 'string', 'max:255'],
        'number' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
        'password' => ['nullable', 'string', 'min:8'],
        'new_password' => ['nullable', 'string', 'min:8'],
    ]);

    $user = User::find($user->id);

    if (isset($validatedData['new_password']) && !empty($validatedData['new_password'])) {
        $user->password = Hash::make($validatedData['new_password']);
    }

    unset($validatedData['new_password']);

    $user->fill($validatedData)->save();

    return redirect()->back()->with('success', 'Profile updated successfully!');
}








}