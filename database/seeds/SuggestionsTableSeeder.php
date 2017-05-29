<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class SuggestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('suggestions')->insert([
            'name' => str_random(10),
            'description' => str_random(50),
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }
}
