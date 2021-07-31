<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class States extends Model
{
    use HasFactory;
    function countries(){
        return $this->belongsTo('App\Models\Country');
    }
    function city(){
        return $this->hasMany('App\Models\Cities');
    }
}
