<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function join(){
        return view("join");
    }

    public function store(Request $request){
        if(User::where('email',$request->email)->count()){
            return view('join',["message"=>"이미 사용중인 이메일입니다."]);
        }

        $res = User::create([
                         'email'=>$request->email,
                         'name'=>$request->name,
                         'password'=>bcrypt($request->password),
                         'phone'=>$request->phone,
                         'weight'=>$request->weight,
                         'height'=>$request->height,
                         'age'=>$request->age,
                         'gender'=>$request->gender,
                         'exercise_time'=>$request->exercise_time,
                     ]);
        if($res){
            return view('login');
        }
        return view('join');
    }
}
