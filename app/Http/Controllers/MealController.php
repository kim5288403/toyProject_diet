<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\MealFood;
use App\Models\MealHashTag;
use Illuminate\Http\Request;

class MealController extends Controller
{
    public function meal(){
        return view("make");
    }

    public function create(Request $request){
        $model = new Meal();
        $data = $request->all();
        $data["users_id"] = auth()->id();
        $res = $model->create($data);
        if ($res){
            $hashData["hash_tag_id"] = $data["hashTag"];
            $hashData["meal_id"] = $res->id;
            $mealHashModel = (new MealHashTag())->create($hashData);
            $foodData["food_id"] = $data["food"];
            $foodData["meal_id"] = $res->id;
            $mealFoodModel = (new MealFood())->create($foodData);

            return view("index");
        }else{
            return redirect("make");
        }
    }

}
