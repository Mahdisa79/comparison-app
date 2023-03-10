<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\Member\MemberLoginRequest;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function login()
    {
        
        return view('auth.login');
    }

    public function attemptLogin(Request $request)
    {
        $data = $this->validate($request, [
            'email' => 'required|max:120|min:2',
            'password' => 'required|string|max:255|unique:users,username',  
            'captcha' => 'required|captcha'
        ]);

        try {

            if (Auth::attempt(['email' => $data['email'] , 'password' => $data['password']]))
            return redirect()->route('customer.home');

            elseif (Auth::attempt(['username' => $data['email'] , 'password' => $data['password']]))
            return redirect()->route('customer.home');

            else
                return back()->withErrors('نام کاربری یا گذرواژه نادرست است');

        } catch (\Exception $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function logout(Request $request)
    {
    Auth::logout(); 
    $request->session()->invalidate();

    $request->session()->regenerateToken();
    return redirect()->route('customer.home');
    }

}
