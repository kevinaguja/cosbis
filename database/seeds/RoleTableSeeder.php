<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Role::class)->create(['name'=>'admin']);
        factory(App\Role::class)->create(['name'=>'Student']);
        factory(App\Role::class)->create(['name'=>'Supreme Student Council']);
    }
}
