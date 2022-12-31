<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class Course_Sub_Category extends Model
{
    use HasFactory;
    use Sortable;

    protected $table = 'course_sub_categories';
    protected $fillable = [
        'topic_id',
        'course_sub_name',
    ];

    public $sortable = [
        'topic_id',
        'course_sub_name',
    ];

    public function Topic()
    {
        return $this->belongsTo('App\Models\Topic', 'topic_id', 'id');
    }

    public function Course_Category()
    {
        return $this->hasMany('App\Models\Course_Category', 'course_sub_id', 'id');
    }

}