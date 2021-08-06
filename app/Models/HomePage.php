<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
    use HasFactory;
    protected $fillable = [
        'description',
        'button_text',
        'button_link',
        'image_big',
        'image_medium',
        'image_small',
        'image_alt',
        'image_title'
    ];
}
