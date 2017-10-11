<?php

use Illuminate\Database\Seeder;

class OrganizationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(App\Organization::class,10)->create();

        factory(App\Organization::class)->create([
            'name'=> 'BLAS',
            'description'=> 'Benildean Literary Arts Society',
            'img'=>'/img/organizations/blas.jpg',
            'logo'=>'/img/organizations/logo.jpg',
        ]);

        factory(App\Organization::class)->create([
            'name'=> 'BSD',
            'description'=> 'Benildean System Developers',
            'img'=>'/img/organizations/default.jpg',
            'logo'=>'/img/organizations/logo.jpg',
        ]);

        factory(App\Organization::class)->create([
            'name'=> 'NC',
            'description'=> 'Nap Committee',
            'img'=>'/img/organizations/default.jpg',
            'logo'=>'/img/organizations/logo.jpg',
        ]);

        factory(App\Organization::class)->create([
            'name'=> 'SC',
            'description'=> 'Snacks Committee',
            'img'=>'/img/organizations/default.jpg',
            'logo'=>'/img/organizations/logo.jpg',
        ]);;

        factory(App\Organization::class)->create([
            'name'=> 'SE',
            'description'=> 'Sports Enthusiasts',
            'img'=>'/img/organizations/default.jpg',
            'logo'=>'/img/organizations/logo.jpg',
        ]);
    }
}
