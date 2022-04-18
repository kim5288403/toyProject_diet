<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function data(){
        $model = new Food();
        $data = $model->getData();
        return $data;
    }
}
