<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   protected $table='amazon_products';
   protected $fillable=['category_id','product_name',
   'product_price','product_description',
   'product_quantity','product_image','status'];
}
