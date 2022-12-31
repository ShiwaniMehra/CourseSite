<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class RefundOrder extends Model
{
    use HasFactory;
    use Sortable;
    protected $fillable = [
        'amount',
        'transaction_no',
    ];

    public $sortable = [
        'amount',
        'transaction_no',
    ];

        public function ReturnOrder()
    {
        return $this->hasMany('App/Models/ReturnOrder', 'refund_id', 'id');
    }
}
