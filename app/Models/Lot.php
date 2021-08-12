<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\Seller;
use App\Models\Auction;
use App\Models\category;
use App\Models\Bid;
use App\Models\Material;
class Lot extends Model
{
    use HasFactory;
    protected $fillable = [
        'auction_id',
        'lot_number',
        'category',
        'material',
        'description',
        'min_price',
        'max_price',
        'current_bid',
        'asking_bid',
        'thumbnail',
        'image',
        'sold_price',
        'sold',
        'closed'
    ];
    public function materials(){
        return $this->belongsTo(Material::class,'material','id');
    }
    public function auctions(){
        return $this->belongsTo(Auction::class,'auction_id','id');
    }
    public function singlecategory(){
        return $this->belongsTo(category::class,'category','id');
    }
    public function bid(){
        return $this->hasMany(Bid::class,'lot_id','id')->orderBy('created_at','desc');
    }
}
