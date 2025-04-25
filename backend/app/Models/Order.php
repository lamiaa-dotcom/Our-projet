<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
