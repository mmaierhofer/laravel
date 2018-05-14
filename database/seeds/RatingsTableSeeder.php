<?php

use Illuminate\Database\Seeder;

class RatingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ratings')->insert([
            'user_id' => '1',
            'book_id' => '1',
            'rating' => '3',
            'comment' => 'cool book, tho',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('ratings')->insert([
            'user_id' => '1',
            'book_id' => '2',
            'rating' => '4',
            'comment' => 'Also very cool book, bruh',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
    }
}
