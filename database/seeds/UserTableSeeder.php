<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class)->create([
            'firstname'=>'Super',
            'lastname'=>'Administrator',
            'email' =>'cosbr@cosbr.com',
            'is_verified' => '1',
            'role_id' => '1',
            'student_number' => 'CoSBR-ADMIN',
            'phone' => '0999-231-3122',
            'is_suspended' => '0',
            'password' => '$2a$06$0Cz/opS0QXtJbwN4K8clzu5jp8uDfFPL.c.Cd/lWzatn9b6cV6MOi',
        ]);
        factory(App\User::class)->create([
            'firstname'=>'Earl Kevin',
            'lastname'=>'Aguja',
            'email' =>'sc@cosbr.com',
            'is_verified' => '1',
            'role_id' => '3',
            'img' => '/img/account_img/example.jpg',
            'student_number' => '1',
            'phone' => '0999-123-1234',
            'is_suspended' => '0',
            'password' => '$2a$06$0Cz/opS0QXtJbwN4K8clzu5jp8uDfFPL.c.Cd/lWzatn9b6cV6MOi',
        ]);
        factory(App\User::class)->create([
            'firstname'=>'Ann Lindsey',
            'lastname'=>'Soriano',
            'email' =>'student@cosbr.com',
            'is_verified' => '1',
            'role_id' => '2',
            'img' => '/img/account_img/example.jpg',
            'student_number' => '2',
            'phone' => '0999-3231-534',
            'is_suspended' => '0',
            'password' => 'cosbr',
        ]);
    }
}
