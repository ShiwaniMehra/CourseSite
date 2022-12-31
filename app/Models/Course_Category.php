<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course_Category extends Model
{
    use HasFactory;

    protected $table = 'course_categories';
    protected $fillable = [
        'course_sub_id',
        'course_cat_name',
    ];

    public function Course_Sub_Category()
    {
        return $this->belongsTo('App\Models\Course_Sub_Category', 'course_sub_id', 'id');
    }
}