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
        factory(App\Position::class)->create(['name'=>'VP Operations']);
        factory(App\Position::class)->create(['name'=>'VP Activities']);
        factory(App\Position::class)->create(['name'=>'VP Academics']);
        factory(App\Position::class)->create(['name'=>'VP Finance']);
        factory(App\Position::class)->create(['name'=>'Secretary']);
    }
}
