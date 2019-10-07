<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Meeting;
use App\User;

class Organization extends Model
{
    protected $fillable = [
        'name','user_id'
     ];

     public function user()
     {
         return $this->belongsToMany('App\User' , 'user_id');
     }
}
