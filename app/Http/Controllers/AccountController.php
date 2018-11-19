<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function dashboard(){
        $user_role = Auth::user()->role ;
//        return $user_role;
        return view('account.individual.home');
    }
        
}
