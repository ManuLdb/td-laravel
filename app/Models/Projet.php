<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    protected $fillable = ['title', 'content', 'user_id'];


    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}
