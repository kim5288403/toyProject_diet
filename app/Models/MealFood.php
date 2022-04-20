<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealFood extends Model
{
    use HasFactory;
    protected $table = "meal_food";
    public function convertModel($data) {
        if(isset($data['food_id']))            $this->food_id          = $data['food_id'];
        if(isset($data['food_id']))            $this->meal_id          = $data['meal_id'];
        if(isset($data['meal_id']))            $food_data              = (new Food())->with(["category"])->where("id",$data['food_id'])->first();
        $this->food_image = $food_data->image;
        $this->food_name = $food_data->name;
        $this->food_category =$food_data["category"][0]->name;
        return $this;
    }

    public function create($data){
        foreach (explode(",",$data['food']) as $item){
            $res = new self();
            $data['food_id'] = $item;
            $res->convertModel($data);
            $res->save();
        }
        return $res;
    }
}
