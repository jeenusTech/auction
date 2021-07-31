<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Auction;
use App\Models\Lot;
use App\Models\User;
class Bid extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'auction_id',
        'lot_id',
        'bid_amount',
        'awarded'
    ];
    public function lot(){
        return $this->belongsTo(Lot::class,'lot_id','id');
    }
    public function auction(){
        return $this->belongsTo(Auction::class,'auction_id','id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
