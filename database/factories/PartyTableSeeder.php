<?php

use Illuminate\Database\Seeder;

class PartyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Party::create([
            'name' => 'Independent',
            'slogan' => 'Independent',
            'description' =>'Independent',
            'banner' => '/img/cosbis/header.png',
            'logo' => 'img/election/party/logo.png',
        ]));
    }
}
