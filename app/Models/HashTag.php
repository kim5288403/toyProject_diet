<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HashTag extends Model
{
    use HasFactory;
    protected $table = "hash_tag";

    public function getList($data){
        return self::when($data,function ($query,$txt){
            $query->where(function ($q) use ($txt){
               $q->where("name","like","%".$txt."%");
            });
        })->get();
    }

    public function create($data){
        foreach (explode("#",$data) as $item){
            if (!empty($item)){
                $item = str_replace(" ","",$item);
                $check = self::where("name",$item)->first();
                if (empty($check)){
                  $model = new self();
                  $model-> name = $item;
                  $model-> tag_count = 1;
                  $model->save();
                }else{
                    $updateData = self::find($check->id);
                    $updateData-> name = $item;
                    $updateData-> tag_count = $check->tag_count + 1;
                    $updateData->save();
                }
            }
        }
    }
}
