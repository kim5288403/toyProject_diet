<?php

namespace App\Http\Controllers;

use App\Models\SuggestNutrition;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function join(){
        return view("join");
    }

    public function login(Request $request){
        $credentials = [
            'email'=>$request->email,
            'password'=>$request->password
        ];
        if(!auth()->attempt($credentials)){
            return view("login",["message"=>"로그인정보가 정확하지 않습니다."]);
        }
        return view('index');
    }

    public function store(Request $request){
        $data = $request->all();
        if(User::where('email',$data["email"])->count()){
            return view('join',["message"=>"이미 사용중인 이메일입니다."]);
        }

        $data["users_id"] = User::insertGetId([
                         'email'=>$data["email"],
                         'name'=>$data["name"],
                         'password'=>bcrypt($data["password"]),
                         'phone'=>$data["phone"],
                         'weight'=>$data["weight"],
                         'height'=>$data["height"],
                         'age'=>$data["age"],
                         'gender'=>$data["gender"],
                         'exercise_time'=>$data["exercise_time"],
                     ]);

        if(!empty($data["users_id"])){
            (new SuggestNutrition())->create($data);

            return view('login');
        }
        return view('join');
    }

    public function logout(){
        auth()->logout();
        return view('login');
    }
}
