<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = ['car_name', 'company', 'image', 'price', 'user_id','description'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
