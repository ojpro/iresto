<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('users')->insert([
		
                        'full_name'=>$this->faker->name(),
                'number'=>$this->faker->phoneNumber(),
                        'username'=>$this->faker->userName(),
                'email'=>$this->faker->email(),
                'password'=> Hash::make('password')
        
	]);
    }

}
