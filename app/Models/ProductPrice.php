<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductPrice extends Model
{
    protected $fillable=[
        "currency_id",
        "product_id",
        "price"
    ];
  protected $hidden = [
    'created_at',
    'updated_at',
    'deleted_at',
];

    public function product()
    {
       return  $this->belongsTo(Product::class);
    }

    public function currency()
    {
       return  $this->belongsTo(Currency::class);
    }

}
