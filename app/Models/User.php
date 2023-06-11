<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Member\Member;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'usr_password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'usr_email_verified_at' => 'datetime',
        'usr_password' => 'hashed',
    ];

    public function getAuthIdentifierName()
    {
        return 'usr_name';
    }

    public function getAuthPassword()
    {
        return $this->usr_password;
    }

    public function member()
    {
        return $this->hasOne(Member::class, 'mbr_usr_id', 'id');
    }

    public function own($id)
    {
        if($id == auth()->user()->id){
            return true;
        }else{
            return false;
        }
    }

    public function userActive($status)
    {
        if($status == 1){
            return true;
        }else{
            return false;
        }
    }
}
