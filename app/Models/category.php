<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Auction;
use App\Models\Lot;
class category extends Model
{
    use HasFactory;
    protected $fillable = [
        'cat_name',
        'cat_image',
    ];
    // public function auction(){
    //     return $this->hasMany(Auction::class,'category');
    // }
    public function lots(){
        return $this->hasMany(Lot::class,'category');
    }
}
