<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newsletter){
        request()->validate(['email'=>'required|email']);

        try {
            $newsletter= new Newsletter();
            $newsletter->subscribe(request('email'));
        } catch (Exception $e){
            throw ValidationException::withMessages([
                'email'=>'This email can not be added'
            ]);
        }

        return redirect('/')->with('success','Subscription added');
    }
}
