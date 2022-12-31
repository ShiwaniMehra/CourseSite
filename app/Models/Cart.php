<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    public $table = 'carts';
    protected $fillable = [
        'course_id',
        'cart_TotalPrice',
        'quantity',
    ];

    public function Course()
    {
        return $this->belongsTo('App\Models\Course', 'course_id', 'id');
    }

    public function user_id()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
