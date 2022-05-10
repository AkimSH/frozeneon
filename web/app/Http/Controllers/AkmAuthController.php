<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Mockery\Exception;

class AkmAuthController extends Controller
{
    public function index()
    {
        if (Auth::user()) {
            return redirect('/');
        }

        return view('auth.login');
    }


    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect('/');
        }

        return redirect("login")->withErrors(['message' => 'Wrong password or login']);
    }


    public function ajaxCustomLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return response()->json(['user' => true]);
        }

        return false;
    }



    public function registration()
    {
        if (Auth::user()) {
            return redirect('/');
        }

        return view('auth.reg');
    }


    public function customRegistration(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'password_repeat' => 'required|same:password',
            'personaname' => 'required|unique:users',
            'avatarfull' => 'mimes:img,jpg,jpeg,png',
        ]);

        $data = $request->all();

        $user = $this->create($data);
        if (!$user){
            return redirect("/registration")->withErrors(['errors' => 'Sorry something went wrong']);
        }

        if ($request->avatarfull){
            $extension = $request->file('avatarfull')->getClientOriginalExtension();
            $filename  = $user->personaname . '-' . $user->id . '.' . $extension;
            $path      = $request->file('avatarfull')->move("images/avatars", $filename);

            $user->avatarfull = $path;
            $user->save();
        }

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);

        return redirect('/');
    }


    private function create(array $data)
    {
        try {
            return User::create([
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'personaname' => $data['personaname'],
            ]);
        } catch (Exception $exception) {
            //logging
            return false;
        }
    }


    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect()->back();
    }
}
