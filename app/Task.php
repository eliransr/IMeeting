<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Meeting;
use App\User;
use App\Organization;
class Task extends Model
{
      protected $fillable = [
        'title', 'due_date','name','status'
    
    ];
}
