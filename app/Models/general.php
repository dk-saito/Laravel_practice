<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Notifications\GeneralResetPassword as ResetPasswordNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class general extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    public function sendPasswordResetNotification($token){

        $this->notify(new ResetPasswordNotification($token));
    }
    protected $guard='general';
    protected $fillable=[
        'name',
        'email',
        'password',
        'login_id',
    ];
    protected $hidden=[
        'password',
        'remember_token',
    ];
    protected $casts=[
        'email_verified_at'=>'datetime',
    ];

    public function contents(){
        return $this->belongsToMany(Content::class);
    }

}
