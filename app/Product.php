<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'code',
        'unit_buying_cost',
        'unit_selling_cost',
        'quantity',
        'tax_rate',
        'sold_out_flag',
        'created_by'
    ];
}
