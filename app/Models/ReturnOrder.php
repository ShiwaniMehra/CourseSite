<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class ReturnOrder extends Model
{
    use HasFactory;
    use Sortable;

    protected $table = 'return_orders';

    protected $fillable = [
        'user_id',
        'order_id',
        'refund_id',
    ];

    public function OrderItem()
    {
        return $this->hasMany('App/Models/OrderItem', 'course_id', 'id');
    }

    public function User()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
       public function Order()
    {
        return $this->belongsTo('App\Models\Order', 'order_id', 'id');
    }
    public function RefundOrder()
    {
        return $this->belongsTo('App\Models\RefundOrder', 'refund_id', 'id');
    }
}
