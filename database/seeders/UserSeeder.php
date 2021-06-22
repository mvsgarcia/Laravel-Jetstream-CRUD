<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([ 
            'name'=>'Mieca', 
            'email'=>'mieca@email.com', 
            'password'=>Hash::make('12345'),
            'admin'=>true,
            'email_verified_at'=>now(),
        ]); 
    }
}
