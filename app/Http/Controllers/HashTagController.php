<?php

namespace App\Http\Controllers;

use App\Models\HashTag;
use Illuminate\Http\Request;

class HashTagController extends Controller
{
    public function data(Request $request){
        $model = new HashTag();
        $data = $request->input("search");
        $data = str_replace("#","",$data);
        $res = $model->getList($data);
        return $res;
    }
}
