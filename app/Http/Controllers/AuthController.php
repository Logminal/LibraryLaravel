<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserLoginRequest;
use App\Http\Requests\User\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function storeReg(UserRequest $request)
    {
        // dd($request);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect(route('home'));
    }

    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {

        // dd($request);

        $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($request->only('name', 'password'))) {
            return redirect(route('home'));
        }

        // dd(Auth::attempt($request->only('name', 'password')));

        return view('auth.login', [
            'message' => 'Авторизация не удалась'
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('home'));
    }

    public function destroy(User $user)
    {
        //
    }
}
