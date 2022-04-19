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
           return view("login")->with(['message'=>'잘못된 로그인 정보입니다.',"type"=>"warning"]);
        }
        return view("index")->with(['message'=>'로그인 성공하였습니다.',"type"=>"success"]);
    }

    public function store(Request $request){
        $data = $request->all();
        if(User::where('email',$data["email"])->count()){
            return view('join')->with(["message"=>"이미 사용중인 이메일입니다.","type"=>"warning"]);
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

            return view("login")->with(['message'=>'회원가입 성공하였습니다.',"type"=>"success"]);
        }
        return view('join')->with(['message'=>'회원가입 실하였습니다.',"type"=>"warning"]);;
    }

    public function logout(){
        auth()->logout();
        return view('login');
    }
}
