<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 
        'price',
        'location',
        'payment_method',
        'user_id', 
        'car_id',
      
    ];

    public function Car()
   {
    return $this->belongsTo('App\Models\Car');
   }

   public function User()
   {
    return $this->belongsTo('App\Models\User');
   }
}
