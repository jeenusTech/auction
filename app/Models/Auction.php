<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\category;
use App\Models\Lot;

class Auction extends Model
{
    use HasFactory;
    protected $fillable = [
        'auction_number',
        'title',
        'description',
        'image',
        'catelogue',
        'start_date',
        'end_date',
        'start_time',
        'end_time',
        'status'
    ];
    // public function auction_category(){
    //     return $this->belongsTo(category::class,'category','id');
    // }

    public function lot(){
        return $this->hasMany(Lot::class,'auction_id','id');
    }
}
