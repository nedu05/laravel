<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class AddToCart extends Model
{
    protected $table='amazon_add_to_carts';
    protected $guarded=[];

    public function products()
    {
      return $this->hasMany(Product::class);
    }


}
