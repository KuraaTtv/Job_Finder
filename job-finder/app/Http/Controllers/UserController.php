<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
   public function create(){
    return view("Users.registre");
   }

   public function store(Request $request)
   {
    $UserForm = $request->validate([
        'name'=>['required','min:3'],
        'email'=>['required','email',Rule::unique('users','email')],
        'password'=>'required|confirmed|min:6'
    ]);
    // Hasing or crypting pass
    $UserForm['password'] = bcrypt($UserForm['password']);
    // Create a new user
    $user = User::create($UserForm);


    
    // $UserForm['password'] = Hash::make($UserForm['password']);
    // login the new user
    auth()->login($user);
    return redirect('/')->with('Message','User created and logged in');
   }


   public function logout(Request $request)
   {
    auth()->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/')->with('Message','User logout');
   }

//    Login form

   public function login ()
    {
            return view('Users.login');
    }

    public function Open (Request $request)
    {
        $UserForm = $request->validate([
            'email'=>['required','email'],
            'password'=>'required'
        ]);

        if(auth()->attempt($UserForm))
        {
            $request->session()->regenerate();
            return redirect('/')->with('Message','User logout');
        }

        return back()->withErrors(['email' => 'Invalid email']);
    }
// $User = $request->validate([
//     'email'=>'required',
//     'password'=>'required'
//    ]);
//   if(!auth()->attempt($User))
//   {
//     return back()->withErrors([
//     'email' => 'Invalid email or password',]);
//   }
//   $request->seesion()->regenerate();
//   return redirect('/')->with('Message','User logout');
//   
}






