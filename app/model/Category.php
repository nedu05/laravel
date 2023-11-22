<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   protected $table='amazon_categories';
   protected $guarded=[];

public function products()
{
  return $this->hasMany(Product::class)->where('amazon_products.status','=',1);
}


}
