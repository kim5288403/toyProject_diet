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
        if(isset($data['meal_id']))         $this->meal_id       = $data['meal_id'];

        return $this;
    }

    public function create($data){
        foreach (explode(",",$data['food_id']) as $item){
            $res = new self();
            $data['food_id'] = $item;
            $res->convertModel($data);
            $res->save();
        }
        return $res;
    }
}
