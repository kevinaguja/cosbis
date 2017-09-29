<?php

use Illuminate\Database\Seeder;

class PositionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Position::class)->create(['name'=>'President']);
        factory(App\Position::class)->create(['name'=>'Vice President']);
        factory(App\Position::class)->create(['name'=>'Secretary']);
        factory(App\Position::class)->create(['name'=>'Treasurer']);
        factory(App\Position::class)->create(['name'=>'Auditor']);
        factory(App\Position::class)->create(['name'=>'First Year Representative']);
        factory(App\Position::class)->create(['name'=>'Second Year Representative']);
        factory(App\Position::class)->create(['name'=>'Third Year Representative']);
        factory(App\Position::class)->create(['name'=>'Fourth Year Representative']);
    }
}
