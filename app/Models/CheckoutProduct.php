<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckoutProduct extends Model
{
    use HasFactory;
    protected $table = "checkout_products";
    protected $primaryKey = "id";

    protected $fillable = [
        'checkout_id', // Add this field to allow mass assignment
        'product_id',
        'cart_id',
        'product_name',
        'quantity',
        'price',
        'total_price',
    ];

    public function checkout()
    {
        return $this->belongsTo(Checkout::class);
    }
}
