<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;
    protected $table = "food";

    public function category(){
        return $this->hasMany(FoodCategory::class, "id","category_id");
    }

    public function getData(){
        return self::with("category")->get()->map(function ($item){
            return [
                "id"=>$item->id,
                "category"=>$item->category[0]->name,
                "name"=>$item->name,
                "calroy"=>$item->calroy,
                "carbohydrate"=>$item->carbohydrate,
                "fat"=>$item->fat,
                "protein"=>$item->protein,
                "sugar"=>$item->sugar,
                "image"=>$item->image
            ];
        });
    }
}
