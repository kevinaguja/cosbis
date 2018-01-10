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
            'birthdate'=>'1994-2-7',
            'email' =>'cosbr@cosbr.com',
            'is_verified' => '1',
            'role_id' => '1',
            'img' => '/img/account_img/example.jpg',
            'student_number' => '0000-00-00000',
            'phone' => '0999-231-3122',
            'is_suspended' => '0',
            'password' => '$2a$06$0Cz/opS0QXtJbwN4K8clzu5jp8uDfFPL.c.Cd/lWzatn9b6cV6MOi',
        ]);
        factory(App\User::class)->create([
            'firstname'=>'Earl Kevin',
            'lastname'=>'Aguja',
            'birthdate'=>'1994-2-7',
            'email' =>'sc@cosbr.com',
            'is_verified' => '1',
            'role_id' => '3',
            'img' => '/img/account_img/example.jpg',
            'student_number' => '0000-00-00001',
            'phone' => '0999-123-1234',
            'is_suspended' => '0',
            'password' => '$2a$06$0Cz/opS0QXtJbwN4K8clzu5jp8uDfFPL.c.Cd/lWzatn9b6cV6MOi',
        ]);
        factory(App\User::class)->create([
            'firstname'=>'Ann Lindsey',
            'lastname'=>'Soriano',
            'birthdate'=>'1994-2-7',
            'email' =>'student@cosbr.com',
            'is_verified' => '1',
            'role_id' => '2',
            'img' => '/img/account_img/example.jpg',
            'student_number' => '0000-00-00002',
            'phone' => '0999-3231-534',
            'is_suspended' => '0',
            'password' => '$2a$06$0Cz/opS0QXtJbwN4K8clzu5jp8uDfFPL.c.Cd/lWzatn9b6cV6MOi',
        ]);
        factory(App\User::class)->create([
            'firstname'=>'Maika Madel',
            'lastname'=>'De Vera',
            'birthdate'=>'1994-2-7',
            'email' =>'student2@cosbr.com',
            'is_verified' => '1',
            'role_id' => '3',
            'img' => '/img/account_img/example.jpg',
            'student_number' => '0000-00-00003',
            'phone' => '0999-3231-533',
            'is_suspended' => '0',
            'password' => '$2a$06$0Cz/opS0QXtJbwN4K8clzu5jp8uDfFPL.c.Cd/lWzatn9b6cV6MOi',
        ]);
        factory(App\User::class)->create([
            'firstname'=>'Fredric Jules',
            'lastname'=>'Cajayon',
            'birthdate'=>'1994-2-7',
            'email' =>'student3@cosbr.com',
            'is_verified' => '1',
            'role_id' => '3',
            'img' => '/img/account_img/example.jpg',
            'student_number' => '0000-00-00004',
            'phone' => '0999-3231-535',
            'is_suspended' => '0',
            'password' => '$2a$06$0Cz/opS0QXtJbwN4K8clzu5jp8uDfFPL.c.Cd/lWzatn9b6cV6MOi',
        ]);

        factory(App\User::class)->create([
            'firstname'=>'Kaila Ria',
            'lastname'=>'De Vera',
            'birthdate'=>'1994-2-7',
            'email' =>'student4@cosbr.com',
            'is_verified' => '1',
            'role_id' => '3',
            'img' => '/img/account_img/example.jpg',
            'student_number' => '0000-00-00005',
            'phone' => '0999-3231-535',
            'is_suspended' => '0',
            'password' => '$2a$06$0Cz/opS0QXtJbwN4K8clzu5jp8uDfFPL.c.Cd/lWzatn9b6cV6MOi',
        ]);

        factory(App\User::class)->create([
            'firstname'=>'Itsey',
            'lastname'=>'Nishida',
            'birthdate'=>'1994-2-7',
            'email' =>'student5@cosbr.com',
            'is_verified' => '1',
            'role_id' => '3',
            'img' => '/img/account_img/example.jpg',
            'student_number' => '0000-00-00006',
            'phone' => '0999-3231-535',
            'is_suspended' => '0',
            'password' => '$2a$06$0Cz/opS0QXtJbwN4K8clzu5jp8uDfFPL.c.Cd/lWzatn9b6cV6MOi',
        ]);

        factory(App\User::class)->create([
            'firstname'=>'Roger Floyd',
            'lastname'=>'Dela Rosa',
            'birthdate'=>'1994-2-7',
            'email' =>'student6@cosbr.com',
            'is_verified' => '1',
            'role_id' => '3',
            'img' => '/img/account_img/example.jpg',
            'student_number' => '0000-00-00007',
            'phone' => '0999-3231-535',
            'is_suspended' => '0',
            'password' => '$2a$06$0Cz/opS0QXtJbwN4K8clzu5jp8uDfFPL.c.Cd/lWzatn9b6cV6MOi',
        ]);

        factory(App\User::class)->create([
            'firstname'=>'Kim Colleen',
            'lastname'=>'Mina',
            'birthdate'=>'1997-2-7',
            'email' =>'student7@cosbr.com',
            'is_verified' => '1',
            'role_id' => '3',
            'img' => '/img/account_img/example.jpg',
            'student_number' => '0000-00-00008',
            'phone' => '0999-3231-535',
            'is_suspended' => '0',
            'password' => '$2a$06$0Cz/opS0QXtJbwN4K8clzu5jp8uDfFPL.c.Cd/lWzatn9b6cV6MOi',
        ]);

        factory(App\User::class)->create([
            'firstname'=>'Jake Kniel',
            'lastname'=>'Mina',
            'birthdate'=>'1994-2-7',
            'email' =>'student8@cosbr.com',
            'is_verified' => '1',
            'role_id' => '3',
            'img' => '/img/account_img/example.jpg',
            'student_number' => '0000-00-00009',
            'phone' => '0999-3231-535',
            'is_suspended' => '0',
            'password' => '$2a$06$0Cz/opS0QXtJbwN4K8clzu5jp8uDfFPL.c.Cd/lWzatn9b6cV6MOi',
        ]);

        factory(App\User::class)->create([
            'firstname'=>'Nikki Ella',
            'lastname'=>'Gonzales',
            'birthdate'=>'1994-2-7',
            'email' =>'student9@cosbr.com',
            'is_verified' => '1',
            'role_id' => '3',
            'img' => '/img/account_img/example.jpg',
            'student_number' => '0000-00-00010',
            'phone' => '0999-3231-535',
            'is_suspended' => '0',
            'password' => '$2a$06$0Cz/opS0QXtJbwN4K8clzu5jp8uDfFPL.c.Cd/lWzatn9b6cV6MOi',
        ]);

        factory(App\User::class)->create([
            'firstname'=>'Joshua',
            'lastname'=>'Guerra',
            'birthdate'=>'1994-2-7',
            'email' =>'student10@cosbr.com',
            'is_verified' => '1',
            'role_id' => '3',
            'img' => '/img/account_img/example.jpg',
            'student_number' => '0000-00-00011',
            'phone' => '0999-3231-535',
            'is_suspended' => '0',
            'password' => '$2a$06$0Cz/opS0QXtJbwN4K8clzu5jp8uDfFPL.c.Cd/lWzatn9b6cV6MOi',
        ]);

        factory(App\User::class)->create([
            'firstname'=>'Cassandra',
            'lastname'=>'Florentino',
            'birthdate'=>'1994-2-7',
            'email' =>'student11@cosbr.com',
            'is_verified' => '1',
            'role_id' => '3',
            'img' => '/img/account_img/example.jpg',
            'student_number' => '0000-00-00012',
            'phone' => '0999-3231-535',
            'is_suspended' => '0',
            'password' => '$2a$06$0Cz/opS0QXtJbwN4K8clzu5jp8uDfFPL.c.Cd/lWzatn9b6cV6MOi',
        ]);

        factory(App\User::class)->create([
            'firstname'=>'Samantha',
            'lastname'=>'Aquinde',
            'birthdate'=>'1994-2-7',
            'email' =>'student12@cosbr.com',
            'is_verified' => '1',
            'role_id' => '3',
            'img' => '/img/account_img/example.jpg',
            'student_number' => '0000-00-00013',
            'phone' => '0999-3231-535',
            'is_suspended' => '0',
            'password' => '$2a$06$0Cz/opS0QXtJbwN4K8clzu5jp8uDfFPL.c.Cd/lWzatn9b6cV6MOi',
        ]);

        factory(App\User::class)->create([
            'firstname'=>'Evana Patricia',
            'lastname'=>'Mendoza',
            'birthdate'=>'1994-2-7',
            'email' =>'student13@cosbr.com',
            'is_verified' => '1',
            'role_id' => '3',
            'img' => '/img/account_img/example.jpg',
            'student_number' => '0000-00-00014',
            'phone' => '0999-3231-535',
            'is_suspended' => '0',
            'password' => '$2a$06$0Cz/opS0QXtJbwN4K8clzu5jp8uDfFPL.c.Cd/lWzatn9b6cV6MOi',
        ]);

        factory(App\User::class)->create([
            'firstname'=>'Mary Keith',
            'lastname'=>'Soriano',
            'birthdate'=>'1994-2-7',
            'email' =>'student14@cosbr.com',
            'is_verified' => '1',
            'role_id' => '3',
            'img' => '/img/account_img/example.jpg',
            'student_number' => '15',
            'phone' => '0999-3231-535',
            'is_suspended' => '0',
            'password' => '$2a$06$0Cz/opS0QXtJbwN4K8clzu5jp8uDfFPL.c.Cd/lWzatn9b6cV6MOi',
        ]);

        factory(App\User::class)->create([
            'firstname'=>'Joyce',
            'lastname'=>'Copon',
            'birthdate'=>'1994-2-7',
            'email' =>'student15@cosbr.com',
            'is_verified' => '1',
            'role_id' => '3',
            'img' => '/img/account_img/example.jpg',
            'student_number' => '0000-00-00016',
            'phone' => '0999-3231-535',
            'is_suspended' => '0',
            'password' => '$2a$06$0Cz/opS0QXtJbwN4K8clzu5jp8uDfFPL.c.Cd/lWzatn9b6cV6MOi',
        ]);

        factory(App\User::class)->create([
            'firstname'=>'Jobelle',
            'lastname'=>'Adona',
            'birthdate'=>'1994-2-7',
            'email' =>'student17@cosbr.com',
            'is_verified' => '1',
            'role_id' => '3',
            'img' => '/img/account_img/example.jpg',
            'student_number' => '0000-00-00017',
            'phone' => '0999-3231-535',
            'is_suspended' => '0',
            'password' => '$2a$06$0Cz/opS0QXtJbwN4K8clzu5jp8uDfFPL.c.Cd/lWzatn9b6cV6MOi',
        ]);

        factory(App\User::class)->create([
            'firstname'=>'Allyra',
            'lastname'=>'Ilagan',
            'birthdate'=>'1994-2-7',
            'email' =>'student18@cosbr.com',
            'is_verified' => '1',
            'role_id' => '3',
            'img' => '/img/account_img/example.jpg',
            'student_number' => '0000-00-00018',
            'phone' => '0999-3231-535',
            'is_suspended' => '0',
            'password' => '$2a$06$0Cz/opS0QXtJbwN4K8clzu5jp8uDfFPL.c.Cd/lWzatn9b6cV6MOi',
        ]);
    }
}
