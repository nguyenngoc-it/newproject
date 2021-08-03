<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user= new  User();
        $user->name= 'user';
        $user->password= Hash::make( '123456');
        $user->email= 'user@gmai.com';
        $user->role_id=2;
        $user->save();
    }
}
