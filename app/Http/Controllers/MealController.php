<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\MealFood;
use App\Models\MealHashTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        DB::beginTransaction();
        try {
            $model = new Meal();
            $data = $request->all();
            $data["users_id"] = auth()->id();
            $res = $model->create($data);
            $data["meal_id"] = $res->id;
            if ($res){
                if (!empty($data["hashTag"])){
                    $mealHashModel = (new MealHashTag())->create($data);
                }
                $mealFoodModel = (new MealFood())->create($data);

                DB::commit();
                return redirect()->route('meal.create')->with(['message'=>'등록 성공 하였습니다.',"type"=>"success"]);
            }
            return redirect()->route('meal.create')->with(['message'=>'등록 실패 하였습니다.',"type"=>"warning"]);
        }catch (\Exception $exception){
            DB::rollBack();
            return redirect()->route('meal.create')->with(['message'=>"등록 실패 하였습니다.","type"=>"warning"]);
        }

    }

}
