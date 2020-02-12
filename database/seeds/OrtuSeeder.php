<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class OrtuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	// SEEDER
        // DB::table('ortu')->insert([
        // 	'ayah' => 'Ahmad',
        // 	'ibu' => 'Rina',
        // 	'alamat' => 'kediri'
        // ]);

        //faker
        $faker = Faker::create('id_ID');
        for($i = 1; $i <= 10; $i++){
 
    		DB::table('ortu')->insert([
    			'ayah' => $faker->name,
    			'ibu' => $faker->name,
    			'alamat' => $faker->address
    		]);
 
    	}

    }
}
