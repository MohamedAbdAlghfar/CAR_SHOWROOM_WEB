<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'brand',
        'n_of_pieces', 
        'fuel_type',
        'buy',
        'price',
        'year',
        'country',
        'color',
        'filename',
      
    ];

    public function Orders()
    {
        return $this->hasMany('App\Models\Order');
    }

    
}
