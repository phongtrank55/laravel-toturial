<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable =['name', 'summary', 'img', 'category_id', 'price'];
    public function category()
   {
       return $this->belongsTo('App\Category','category_id');
   }
}
