<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarLog extends Model
{
    use HasFactory;
    

    protected $fillable = [
        'car_name',
        'user_name',
        'action',
        'details',
    ];

    
}
