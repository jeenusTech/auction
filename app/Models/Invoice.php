<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Auction;
use App\Models\Lot;
use App\Models\User;
use App\Models\Bid;
class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'auction_id',
        'lot_id',
        'bid_id',
        'invoice_number',
        'hsn',
        'gst',
        'description',
        'gross',
        'commission_percentage',
        'commission_amount',
        'shipping',
        'total_gst',
        'roundoff',
        'total_amount',
        'total_in_words',
        'delivery_place',
        'dispatched_place',
        'paid'
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
    public function bid(){
        return $this->belongsTo(Bid::class,'bid_id','id');
    }
}
