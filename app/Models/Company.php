<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
        'owner_name', 
        'address',
        'phone',
        'email'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
