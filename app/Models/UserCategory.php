<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCategory extends Model
{
    use HasFactory;
    public function users(){
        return $this->hasMany('App\Models\User','bid_plan','id');
    }
    protected $fillable = [
        'name',
        'bid_limit'
    ];
}
