<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteInfo extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'meta_description',
        'fb',
        'instagram',
        'twitter',
        'door_number',
        'street',
        'district',
        'state',
        'country',
        'pin',
        'email',
        'phone',
        'bank_name',
        'account_number',
        'neft_code',
        'gstin',
        'map_link'
    ];
}
