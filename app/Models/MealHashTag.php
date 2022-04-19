<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealHashTag extends Model
{
    use HasFactory;
    protected $table = "meal_hash_tag";
    public function convertModel($data) {
        if(isset($data['hash_tag_id']))            $this->hash_tag_id          = $data['hash_tag_id'];
        if(isset($data['meal_id']))         $this->meal_id       = $data['meal_id'];

        return $this;
    }

    public function create($data){
        foreach (explode(",",$data['hash_tag_id']) as $item){
            $res = new self();
            $data['hash_tag_id'] = $item;
            $res->convertModel($data);
            $res->save();
        }
        return $res;
    }
}
