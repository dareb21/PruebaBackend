<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{  
    use SoftDeletes;
    protected $fillable=[
          "name",
            "price",
            "currency_id",
            "description",
            "tax_cost",
            "manufacturing_cost"
    ];
    
  protected $hidden = [
    'created_at',
    'updated_at',
    'deleted_at',
];


public function prices()
  {
    return  $this->hasMany(ProductPrice::class);
  }

}
