<?php

use Illuminate\Database\Seeder;

class EventsCommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\EventComment::class,50)->create();
    }
}
