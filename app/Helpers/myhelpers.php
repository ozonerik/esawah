<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

function myapp(){
    $data=[];
    $data=[
    'copyright'=>'<strong>Copyright &copy; 2020 <a href="mailto:ozonerik@gmail.com">ozonerik</a>.</strong> All rights reserved.',
    'version'=>'v.1.0.0',
    'author'=>'M. Ade Erik',
    'description'=>'eSawah - Sistem Informasi Lanja Sawah',
    'generator'=>'eSawah v1.0.0'
    ];
    return $data;
}

function convert_date($date){
    if (!empty($date)){
      return date("d-m-Y", strtotime($date));
    }else{
      return null;
    };
}

function user_status($status){
    if (!empty($status)){
      return "<span class='badge badge-primary'>Active</span>";
    }else{
      return "<span class='badge badge-success'>Waiting</span>";
    };
}

function req_code()
{
  do {
      $randomkode = Str::random(8);
      $query    = DB::table('users')
        ->select('request_code')
        ->where('request_code',$randomkode);     
      $result=$query->get();
      $count=$result->count();
    } while ($count = 0);  
         
    return $randomkode;
}