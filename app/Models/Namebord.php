<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Namebord extends Model
{
protected $table = 'namebord';

function user()
{
    return $this->belongsTo(User::class,'userID','id');

}
}
