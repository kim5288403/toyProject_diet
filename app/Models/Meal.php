<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;
    protected $table = "meal";

    public function mealHashTag(){
        return $this->hasMany(MealHashTag::class,"meal_id","id");
    }

    public function getSearchList(){
        return self::with(["mealHashTag"])->whereNotNull("id");
    }

    public function convertModel($data) {
        if(isset($data['title']))            $this->title          = $data['title'];
        if(isset($data['users_id']))         $this->users_id       = $data['users_id'];
        if(isset($data['fat']))              $this->fat            = str_replace(",","",$data['fat']);
        if(isset($data['calorie']))          $this->calorie        = str_replace(",","",$data['calorie']);
        if(isset($data['protein']))          $this->protein        = str_replace(",","",$data['protein']);
        if(isset($data['carbohydrate']))     $this->carbohydrate   = str_replace(",","",$data['carbohydrate']);

        return $this;
    }

    public function create($data){
        $res = new self();
        $res->convertModel($data);
        $res->save();
        return $res;
    }
}
