<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class insert_user extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
        $user = [
          
            'name' => 'Amar wirahadi Kusuma',
            'email' => 'amar@gmail.com',
            'password' => 'amar123',

        ];


        DB::table('users')->insert([
            
            'name' => $user['name'],
            'email' => $user['email'],
            'password' => Hash::make($user['password']),
        ]);

    }
}
