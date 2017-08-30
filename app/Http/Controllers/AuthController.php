<?php
/**
 * Created by PhpStorm.
 * User: ideo5
 * Date: 29.08.2017
 * Time: 12:51
 */


namespace Bevy\Http\Controllers;
use Bevy\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function getSignup()
    {
        return view('auth.signup');
    }

    public function postSignup(Request $request)
    {
        $this->validate($request, [
            'email' =>'required|unique:users|email|max:255',
            'username' => 'required|unique:users|alpha_dash|max:20',
            'password' => 'required|min:6',

        ]);

        User::create([
            'email'=> $request->input('email'),
            'username'=> $request->input('username'),
            'password'=> bcrypt($request->input('password')),
        ]);

        return redirect()
            ->route('home')
            ->with('info', 'Twoje konto zostało utworzone ! Witamy w gronie Naszych użytkowników !');
    }
    public function getSignin()
    {
        return view('auth.signin');
    }

    public function postSignin(Request $request)
    {
        $this->validate($request, [
            'email' =>'required',
            'password' => 'required',
        ]);

        if (!Auth::attempt($request->only(['email','password']), $request->has('remember')))
        {
            return redirect()->back()->with('info', 'Podane dane są nieprawidłowe !');
        }
            return redirect()->route('home')->with('info', 'Witamy !');


    }
    public function getSignout(){
        Auth::logout();

        return redirect()->route('home')->with('info', 'Zostałeś wylogowany !');
    }



}

