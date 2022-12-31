<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Payment extends Model
{
    use HasFactory;
    use Sortable;
    protected $table = 'payments';

    protected $fillable = [
        'payment_type',
        'payment_status',
        'transaction_no',
    ];

    public $sortable = [
        'payment_type',
        'payment_status',
        'transaction_no',
    ];

    public function Order()
    {
        return $this->hasMany('App/Models/Order', 'payment_id', 'id');
    }
}
