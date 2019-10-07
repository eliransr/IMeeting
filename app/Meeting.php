<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Meeting extends Model
{

    protected $fillable = [
        'title', 'date', 'hour',

    ];
    public function user()
    {
        return $this->belongsToMany('App\User');
    }
    

}
