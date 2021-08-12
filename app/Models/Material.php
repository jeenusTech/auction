<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lot;
class Material extends Model
{
    use HasFactory;
    protected $fillable=[
        'name'
    ];
    public function lot(){
        return $this->hasMany(Lot::class,'material','id')->orderBy('created_at','desc');
    }
}
