<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ([
        'orderid',
        'order_date',
        'ordered_items',
        'total',
        'customer_name',
        'customer_email',
        'customer_phone',
        'customer_address',
        'order_status',
        'order_delivery',
        'shipping_fee',
        'payment_type',
        'receipt_copy',
        'processed',
        'shipped',
        'enroute',
        'arrived',
    ]);
}
