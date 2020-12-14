<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class insert_type_financial extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $type_financial = [
            [
                'name' => 'Kebutuhan Harian',
            ],
            [
                'name' => 'Kebutuhan Mendesak',
            ],
            [
                'name' => 'Peralatan Mandi',
            ],
            [
                'name' => 'Kendaraan',
            ],
            [
                'name' => 'Pakaian',
            ],
            [
                'name' => 'Peralatan',
            ]
        ];

        foreach ($type_financial as $data){
           
            DB::table('type_financial')->insert([
               
                'name' => $data['name'],
            ]);

        }

    }
}
