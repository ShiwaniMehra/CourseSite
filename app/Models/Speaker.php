<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
    use HasFactory;
    protected $fillable = [
        'speaker'
    ];
    public $sortable = [
        'speaker',
    ];

    public function Course()
    {
        return $this->hasMany('App/Models/Course', 'speaker_id', 'id');
    }
}
