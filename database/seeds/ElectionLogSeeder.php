<?php

use Illuminate\Database\Seeder;

class ElectionLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ElectionLog::class)->create();
    }
}
