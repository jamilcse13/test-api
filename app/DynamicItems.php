<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DynamicItems extends Model
{
    protected $table = 'dynamic_items';
    protected $fillable = [
        'name',
        'sub_items'
    ];
}
