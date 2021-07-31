<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lot;

class Seller extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'product_image',
        'mobile',
        'email',
        'address',
        'lot_number',
        'expected_price',
        'allot_price',
        'approved',
        'declined',
        'pending'
    ];
    public function lots(){
        return $this->hasMany(Lot::class,'id','seller_id');
    }
}
