<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'time_create',
        'checkout',
        'address'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'id_order');
    }
}
