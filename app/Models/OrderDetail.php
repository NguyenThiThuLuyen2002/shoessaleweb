<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_order',
        'id_product_detail',
        'quantity',
        'status'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'id_order');
    }

    // Mối quan hệ many-to-one với ProductDetail
    public function productDetail()
    {
        return $this->belongsTo(ProductDetail::class, 'id_product_detail');
    }
}
