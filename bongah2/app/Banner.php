<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Photo;
use App\User;


class Banner extends Model
{

    protected $fillable=[
        'street',
        'city',
        'zip',
        'country',
        'state',
        'price',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function ownedBy(User $user)
    {
        return $this->user_id==$user->id;      // $this->user_id   mal banners table ast 2ta==bayad dar model bashad
    }
    
    public function getPriceAttribute($price)
    {
        return '$'.number_format($price);
    }
//--------------------------------------------------------------------------------
    // public  function scopeLocatedAt($query,$zip,$street)
//    public static function LocatedAt($zip,$street)     //($query,$zip,$street) Age bekhahim az where estefade konim bayad $query ra vared konim
//    {
//
//        $street=str_replace('-',' ',$street);
//        // return $query->where(compact('zip','street'));
//        return static::where(compact('zip','street'))->firstOrFail();
//
//    }
//
//    public function addPhoto(Photo $photo)
//    {
//        return $this->photos()->save($photo);
//
//    }
//----------------------------------------------------------------------------------
    public static function LocatedAt($zip,$street)     //($query,$zip,$street)
    {

        $street=str_replace('-',' ',$street);
        // return $query->where(compact('zip','street'));
        return static::where(compact('zip','street'))->first();

    }

    public function addPhoto(Photo $photo)
    {
        return $this->photos()->save($photo);

    }
//----------------------------------------------------------------------------------
    public function path()
    {
        return $this->zip.'/'. str_replace(' ','-', $this->street);
    }




}
