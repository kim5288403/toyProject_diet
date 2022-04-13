<?php

namespace App\Http\Controllers;

use App\Models\SuggestNutrition;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function detail($id){
        if (auth()->check()){
            $view = view("detail");
            $view -> info = User::find($id);
            $view -> info["suggest_nutrition"] = SuggestNutrition::where("users_id",$id)->first();
            return $view;
        }
        return view("login");
    }
}
