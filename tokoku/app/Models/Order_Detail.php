<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Detail extends Model
{
    use HasFactory;
    protected $table = 'order_details';
    protected $fillable = ['order_id', 'product_id', 'qty', 'price', 'amount', 'discount'];

    public function product()
    {
        return $this->belongsTo(Product::class)->withPivot('qty');
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
