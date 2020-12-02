<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User_verification extends Authenticatable
{
    public $table = 'users_verification';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','otp','created_at','updated_at'];

    public function attribute()
    {
        return $this->belongsTo(\Attribute::class,'attribute_id');
    }


}
