<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class friendship extends Model
{
    //integret with the friendship table
    protected $fillable = ['requester', 'user_requested', 'status'];
}
