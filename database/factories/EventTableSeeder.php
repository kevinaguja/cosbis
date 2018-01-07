<?php

use Illuminate\Database\Seeder;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Event::class)->create([
            'user_id'=> '2',
            'title'=>'Pasko sa Benildo',
            'description'=>'Christmas Party that will be held at College of San Benildo-Rizal.',
            'time'=>'7:00:00',
            'date'=> '2018-12-18',
            'location'=>'College of San Benildo-Rizal',
            'status'=>'approved',
            'type'=>'Party',
            'theme'=>'Casual',
            'img'=>'/img/events/default.jpg',
            'organization_id' => 1
        ]);

        factory(App\Event::class)->create([
            'user_id'=> '3',
            'title'=>'Linggo ng Wika',
            'description'=>'Pag-ginita sa buwan ng wika na gaganapin sa College of San Benildo-Rizal',
            'time'=>'9:00:00',
            'date'=> '2018-1-12',
            'location'=>'College of San Benildo-Rizal',
            'status'=>'approved',
            'type'=>'celebration',
            'theme'=>'Casual',
            'img'=>'/img/events/default.jpg',
        ]);

        factory(App\Event::class)->create([
            'user_id'=> '4',
            'title'=>'Roman Cup',
            'description'=>'Sports festival will be held at College of San Benildo-Rizal, Everyone is encourage to participate just sign up at OSA',
            'time'=>'7:00:00',
            'date'=> '2018-2-13',
            'location'=>'College of San Benildo-Rizal',
            'status'=>'approved',
            'type'=>'Sports',
            'theme'=>'Sports',
            'img'=>'/img/events/default.jpg',
            'organization_id' => 1
        ]);

        factory(App\Event::class)->create([
            'user_id'=> '2',
            'title'=>'College Week',
            'description'=>'College week will be held at the grounds of College of San Benildo-Rizal. Join our exciting games and win prizes.',
            'time'=>'7:00:00',
            'date'=> '2018-1-3',
            'location'=>'College of San Benildo-Rizal',
            'status'=>'approved',
            'type'=>'Party',
            'theme'=>'Casual',
            'img'=>'/img/events/default.jpg',
            'organization_id' => 2
        ]);

        factory(App\Event::class)->create([
            'user_id'=> '3',
            'title'=>'College Orientation',
            'description'=>'College orientation for transferees and new students. The orientation will be held at 5th Floor, college theater',
            'time'=>'7:00:00',
            'date'=> '2018-6-2',
            'location'=>'College of San Benildo-Rizal',
            'status'=>'approved',
            'type'=>'Orientation',
            'theme'=>'Casual',
            'img'=>'/img/events/default.jpg',
            'organization_id' => 3
        ]);

        factory(App\Event::class)->create([
            'user_id'=> '2',
            'title'=>'Pasko sa Benildo part 2',
            'description'=>'Christmas Party that will be held at College of San Benildo-Rizal.',
            'time'=>'7:00:00',
            'date'=> '2018-12-24',
            'location'=>'College of San Benildo-Rizal',
            'status'=>'rejected',
            'type'=>'Party',
            'theme'=>'Casual',
            'img'=>'/img/events/default.jpg',
            'organization_id' => 4
        ]);

        factory(App\Event::class)->create([
            'user_id'=> '3',
            'title'=>'Year-End Party',
            'description'=>' Party that will be held at College of San Benildo-Rizal.',
            'time'=>'7:00:00',
            'date'=> '2018-8-19',
            'location'=>'College of San Benildo-Rizal',
            'status'=>'rejected',
            'type'=>'Party',
            'theme'=>'Casual',
            'img'=>'/img/events/default.jpg',
            'organization_id' => 4
        ]);

        factory(App\Event::class)->create([
            'user_id'=> '2',
            'title'=>'College Week',
            'description'=>'College week will be held at College of San Benildo-Rizal.',
            'time'=>'7:00:00',
            'date'=> '2017-2-3',
            'location'=>'College of San Benildo-Rizal',
            'status'=>'rejected',
            'type'=>'Party',
            'theme'=>'Casual',
            'img'=>'/img/events/default.jpg',
            'organization_id' => 4
        ]);

        factory(App\Event::class)->create([
            'user_id'=> '2',
            'title'=>'Valentines Party',
            'description'=>' Party that will be held at College of San Benildo-Rizal.',
            'time'=>'10:00:00',
            'date'=> '2018-7-1',
            'location'=>'College of San Benildo-Rizal',
            'status'=>'new',
            'type'=>'Party',
            'theme'=>'Casual',
            'img'=>'/img/events/default.jpg',
            'organization_id' => 1
        ]);

        factory(App\Event::class)->create([
            'user_id'=> '2',
            'title'=>'Sports Festivel',
            'description'=>'Sports Festival will be held at College of San Benildo-Rizal.',
            'time'=>'7:00:00',
            'date'=> '2018-2-1',
            'location'=>'College of San Benildo-Rizal',
            'status'=>'new',
            'type'=>'Sports',
            'theme'=>'Sports',
            'img'=>'/img/events/default.jpg',
        ]);

        factory(App\Event::class)->create([
            'user_id'=> '2',
            'title'=>'Lakbay-aral',
            'description'=>'Lakbay-aral na gaganapin sa Antipolo City, lahat ay inaanyayahang sumali magpalista lamang sa OSA',
            'time'=>'7:00:00',
            'date'=> '2018-3-1',
            'location'=>'Antipolo City',
            'status'=>'new',
            'type'=>'Educational Tour',
            'theme'=>'Casual',
            'img'=>'/img/events/default.jpg',
        ]);

        factory(App\Event::class)->create([
            'user_id'=> '3',
            'title'=>'National Museum Tour',
            'description'=>'An Educational tour will be held at national museum of the Philippines at Manila City of February 7,2018. Please get a copy of consent form at OSA',
            'time'=>'9:00:00',
            'date'=> '2018-2-3',
            'location'=>'National Museum',
            'status'=>'new',
            'type'=>'Educational Tour',
            'theme'=>'Casual',
            'img'=>'/img/events/default.jpg',
        ]);

        factory(App\Event::class)->create([
            'user_id'=> '4',
            'title'=>'Feeding program for Antipolo Charity',
            'description'=>'Feeding program will be held at Antipolo Charity on January 30, 2018, you can give your donations at OSA office. Thank you.',
            'time'=>'7:00:00',
            'date'=> '2018-1-2',
            'location'=>'Antipolo City',
            'status'=>'new',
            'type'=>'Charity',
            'theme'=>'Casual',
            'img'=>'/img/events/default.jpg',
        ]);


    }
}
