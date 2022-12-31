<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Topic extends Model
{
    use HasFactory;
    use Sortable;

    protected $table = 'topics';

      protected $fillable = [
        'title',
    ];
    public $sortable = [
        'title',
    ];

    public function Course_Sub_Category(){
        return $this->hasMany('App/Models/Course_Sub_Category', 'topic_id', 'id');
    }
    public function Course()
    {
        return $this->hasMany('App/Models/Course', 'topic_id', 'id');
    }
}
