<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MessagesModel extends Model
{
    protected $table = "messages";

    //public $timestamps = false;

    protected $fillable = [
        'id',
        'message',
        'created_at',
        'updated_at',
        'user_id'
    ];
}
