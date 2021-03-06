<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //

    public  function  category(){
        return $this->belongsTo('App\Category');
    }

    public function productAttributes(){
        return $this->hasMany('App\ProductAttribute');
    }

     public function productImages(){
        return $this->hasMany('App\ProductImage');
    }
}
