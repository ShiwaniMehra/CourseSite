<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;

use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use Sortable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role_id',
        'avatar',
        'first_name',
        'last_name',
        'email',
        'password',
        'phone',
    ];

    public $sortable = [
        'role_id',
        'avatar',
        'first_name',
        'last_name',
        'email',
        'password',
        'phone',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

  
    public function Cart()
    {
        return $this->hasMany('App/Models/Cart', 'user_id', 'id');
    }
    public function Order()
    {
        return $this->hasMany('App/Models/Order', 'user_id', 'id');
    }
    public function ReturnOrder()
    {
        return $this->hasMany('App/Models/ReturnOrder', 'user_id', 'id');
    }
}