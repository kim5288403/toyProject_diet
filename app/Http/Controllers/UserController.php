<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function detail(){
        if (auth()->check()){
            return view("no-sidebar");
        }
        return view("login");
    }
}
