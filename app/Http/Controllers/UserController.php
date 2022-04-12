<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function detail($id){
        if (auth()->check()){
            $view = view("detail");
            $view -> info = User::find($id);

            return $view;
        }
        return view("login");
    }
}
