<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Order extends Model
{
    use HasFactory;
    use Sortable;
    protected $table = 'orders';

    protected $fillable = [
        'order_TotalPrice',
        'user_id',
        'payment_id',
        'order_status',
    ];
    public $sortable = [
        'order_TotalPrice',
        'user_id',
        'payment_id',
        'order_status',
    ];

    public function User()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function Payment()
    {
        return $this->belongsTo('App\Models\Payment', 'payment_id', 'id');
    }

    public function OrderItem()
    {
        return $this->hasMany('App/Models/OrderItem', 'order_id', 'id');
    }

    public function ReturnOrder()
    {
        return $this->hasMany('App/Models/ReturnOrder', 'order_id', 'id');
    }

}
