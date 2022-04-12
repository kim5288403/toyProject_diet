<?php

function getExerciseType($val = null){
    $res = collect();
    $res->put('1.2', "운동을 하지않는다");
    $res->put('1.375', "가끔 운동(1주일 1-3회 운동)");
    $res->put('1.55', "주로 운동(1주일 3-5회 운동)");
    $res->put('1.725', "매일 운동(1주일 5-7회 운동)");
    $res->put('1.9', "격렬한 운동(강한 강도로 1주일 매일 운동)");
    if($val != null)return $res->get($val);
    return $res;
}

function getGender($val = null){
    $res = collect();
    $res->put('male', "남자");
    $res->put('female', "여자");
    if($val != null)return $res->get($val);
    return $res;
}