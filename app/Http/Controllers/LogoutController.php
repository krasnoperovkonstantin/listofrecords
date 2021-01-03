<?php

namespace listofrecords\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades;

class LogoutController extends Controller
{
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
