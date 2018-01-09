<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class);
        $this->call(PositionTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(OrganizationTableSeeder::class);
        $this->call(EventTableSeeder::class);
        $this->call(BlogTableSeeder::class);
        $this->call(NewsTableSeeder::class);
        $this->call(EventsCommentTableSeeder::class);
        $this->call(PartyTableSeeder::class);
    }
}
