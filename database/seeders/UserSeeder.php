<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin=new User([
            'name' => 'admin',
            'email'=>'admin@gmail.com',
            'email_verified_at'=>now(),
            'password' => Hash::make('admin#2021@auction'),
            'remember_token'=>Str::random(10),
            'role'=>'admin',
            'fullname'=>'Bhargava Admin',
            'address_1'=>'Something',
            'landmark'=>'near something',
            'country'=>'101',
            "state"=>'21',
            'city'=>'2073',
            'pincode'=>'4234',
            'mobile_1'=>'8903494298',
            'passport'=>null,
            'passport_file_1'=>null,
            'passport_file_2'=>null,
            'user_verify'=>'1'
        ]);
        $admin->save();
    }
}
