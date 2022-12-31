<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class Course extends Model
{
    use HasFactory, HasApiTokens, Notifiable ,Sortable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'courses';

    protected $fillable = [
        'course_cat_id',
        'speaker_id',
        'title',
        'description',
        'video',
        'course_price',
        'duration',
    ];

    public $sortable = [
        'course_cat_id',
        'speaker_id',
        'id',
        'title',
        'description',
        'video',
        'course_price',
        'duration',
    ];

    public function Speaker()
    {
        return $this->belongsTo('App\Models\Speaker', 'speaker_id', 'id');
    }

    public function Topic()
    {
        return $this->belongsTo('App\Models\Topic', 'topic_id', 'id');
    }
    public function Cart()
    {
        return $this->hasMany('App/Models/Cart', 'course_id', 'id');
    }

    public function OrderItems()
    {
        return $this->hasMany('App/Models/OrderItem', 'course_id', 'id');
    }
}
