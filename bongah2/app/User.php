<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name', 'email', 'password','token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function banners()
    {
        return $this->hasMany(Banner::class);
    }

    public function publish(Banner $banner)
    {
        return $this->banners()->save($banner);
    }

    public function  owns($relation)
    {
        return $relation->user_id==$this->id;
    }

//    public static function scopePremium($query)
//    {
//       return $query->where('type','=','premium');
//    }
//
//    public static function scopeOftype($query,$type)
//    {
//         return $query->where('type',$type);
//
//    }
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
}
