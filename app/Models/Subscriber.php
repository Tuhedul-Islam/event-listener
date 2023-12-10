<?php

namespace App\Models;

use App\Events\UserRegistered;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory;

    protected $fillable = ['email'];

    //Trigger event from model
    /*protected $dispatchesEvents = [
        'saving' => UserRegistered::class,
    ];*/

}
