<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SuggestNutrition extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "suggest_nutrition";

    public function create($data){
        $this->converterValue($data);
        $res = $this->save();
        return $res;
    }

    public function converterValue($data){
        $this->users_id = $data["users_id"];
        if ($data["gender"] === "male"){
            $this->tdee = (66 + (13.8 * $data["weight"]) + (5 * $data["height"]) - (6.8 * $data["age"])) * $data["exercise_time"];
            $this->fat = $data["weight"] * 0.25;
            $this->protein = $data["weight"] * 1.5;
            $this->carbohydrate = (66 + (13.8 * $data["weight"]) + (5 * $data["height"]) - (6.8 * $data["age"])) * 0.5;
            $this->basal_metabolism = (66 + (13.8 * $data["weight"]) + (5 * $data["height"]) - (6.8 * $data["age"]));
            $this->calory = $this->basal_metabolism * 0.8;
        }else{
            $this->tdee = (665 + (9.6 * $data["weight"]) + (1.8 * $data["height"]) - (4.7 * $data["age"])) * $data["exercise_time"];
            $this->basal_metabolism = (665 + (9.6 * $data["weight"]) + (1.8 * $data["height"]) - (4.7 * $data["age"]));
            $this->fat = $this->basal_metabolism * 0.2;
            $this->protein = $data["weight"] * 1.2;
            $this->carbohydrate = (665 + (9.6 * $data["weight"]) + (1.8 * $data["height"]) - (4.7 * $data["age"]))  * 0.5;
            $this->calory = $this->basal_metabolism * 0.7;
        }
        return $this;
    }


}
