<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisteredUserController extends Controller
{
   public function create()
   {
      return view('auth.register');
   }

   public function store()
   {
      //   dd(request()->all());
      request()->validate([
         'first_name'      => ['required'],
         'last_name'       => ['required'],
         'email'           => ['required', 'email'],
         'email_verified_at'  => ['nullable', 'date'],
         'password'        => ['required'],
         'remember_token'  => ['nullable'],
      ]);
   }
}
