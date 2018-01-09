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
        factory(App\Party::create(
            [
                'name' => 'Independent',
                'slogan' => 'Independent',
                'description' => 'Independent',
                'banner' => '/img/cosbis/header.png',
                'logo' => 'img/election/party/default.png',
            ],
            [
                'name' => 'Free Democratic Forces',
                'slogan' => 'Free-er Student Life',
                'description' => 'We strive to provide a better school environment',
                'banner' => '/img/elections/banners/default.png',
                'logo' => 'img/elections/banners/default.png',
            ],
            [
                'name' => 'Christian Democratic Party',
                'slogan' => 'Embodiment of Christian Values',
                'description' => 'Giving the students the best service available',
                'banner' => '/img/elections/banners/default.png',
                'logo' => 'img/elections/banners/default.png',
            ]
        ));
    }
}
