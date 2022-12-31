<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $table = 'order_items';

    protected $fillable = [
        'order_id',
        'course_id',
        'orderItem_price',
        'order_status',
    ];

    public function Order()
    {
        return $this->belongsTo('App\Models\Order', 'order_id', 'id');
    }
    public function Course()
    {
        return $this->belongsTo('App\Models\Course', 'course_id', 'id');
    }
}
