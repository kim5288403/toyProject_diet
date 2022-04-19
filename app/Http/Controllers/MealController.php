<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\MealFood;
use App\Models\MealHashTag;
use Illuminate\Http\Request;

class MealController extends Controller
{
    public function meal(){
        if (auth()->check()) {
            return view("make");
        }
        return view("login");
    }

    public function view(){
        if (auth()->check()) {
            return view("list");
        }
        return view("login");
    }

    public function getData(Request $request){
        $model = new Meal();
        $page  = $request->get('page') ?? 1;
        $limit = $request->get('limit') ?? 10;
        $list = $model->getSearchList();
        $res["total"] = $model->count();

        $res["list"] = $list->skip(($page - 1) * $limit)->take($limit)->get();

        return $res;
    }

    public function create(Request $request){
        $model = new Meal();
        $data = $request->all();
        $data["users_id"] = auth()->id();
        $res = $model->create($data);
        if ($res){
            if (!empty($data["hashTag"])){
                $hashData["hash_tag_id"] = $data["hashTag"];
                $hashData["meal_id"] = $res->id;
                $mealHashModel = (new MealHashTag())->create($hashData);
            }
            $foodData["food_id"] = $data["food"];
            $foodData["meal_id"] = $res->id;
            $mealFoodModel = (new MealFood())->create($foodData);

            return redirect()->route('meal.create')->with(['message'=>'등록 성공 하였습니다.',"type"=>"success"]);
        }else{
            return redirect()->route('meal.create')->with(['message'=>'등록 실패 하였습니다.',"type"=>"warning"]);

        }
    }

}
