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
}
