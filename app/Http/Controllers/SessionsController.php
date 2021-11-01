<?php

namespace App\Http\Controllers;


use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function create(){
        return view('sessions.create');
    }

    public function store(){
        $attributes = request()->validate([
            'email' => ['required'/*,Rule::exists('users','email')*/],
            'password'=> ['required'/*,Rule::exists('users','password')*/]
        ]);

        if(auth()->attempt($attributes)){
            return redirect('/')->with('success','Logged in');
        }

        throw ValidationException::withMessages(['email'=>'Credentials mismatched,Try again']);

       /* return back()
            ->withInput()
            ->withErrors(['email'=>'Credentials mismatched, Try again']);*/
    }


    public function destroy(){

        auth()->logout();

        return redirect('/')->with('success','Logged Out');
    }
}
