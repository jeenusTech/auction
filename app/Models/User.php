<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    public function user(){
        return $this->hasOne('App\Models\UserCategory');
    }
    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'role',
        'fullname',
        'address_1',
        'address_2',
        'landmark',
        'country',
        'state',
        'city',
        'pincode',
        'mobile_1',
        'mobile_2',
        'mobile_verify',
        'mobile_notification',
        'email_notification',
        'pan',
        'pan_status',
        'pan_file',
        'pan_verify',
        'aadhaar',
        'aadhaar_status',
        'aadhaar_file_1',
        'aadhaar_file_2',
        'aadhaar_verify',
        'passport',
        'passport_file_1',
        'passport_file_2',
        'passport_verify',
        'reference_name_1',
        'refernce_name_2',
        'reference_number_1',
        'refernce_number_2',
        'bid_plan',
        'bid_plan_amount',
        'bid_limit_request',
        'bid_limit_request_amount',
        'bid_used',
        'block',
        'user_verify',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
