<?php

use Illuminate\Database\Seeder;

class AddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('addresses')->insert([
            'country' => 'AT',
            'city' => 'Linz',
            'street' => 'Goethestraße',
            'number' => '25',
            'zip' => 4020,
            'user_id' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('addresses')->insert([
            'country' => 'DE',
            'city' => 'Triftern',
            'street' => 'Pfarrer-Venus-Straße',
            'number' => '14',
            'zip' => 84371,
            'user_id' => 2,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
    }
}
