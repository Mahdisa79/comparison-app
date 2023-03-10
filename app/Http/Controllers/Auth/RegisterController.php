<?php


namespace App\Http\Controllers\Auth;


use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required|max:120|min:2',
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => ['required', 'confirmed','min:8'],
            'agree_terms' => 'required',            
        ]);

        try {
        $user = User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        Auth::login($user);
        return redirect()->route('customer.home');
    }catch (\Exception $exception){
    return redirect()->back()->withErrors($exception->getMessage());
    }

    }

}
