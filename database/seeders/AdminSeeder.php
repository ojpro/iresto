<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('admins')->insert([
		
                        'full_name'=>Str::random(10),
                'number'=>$this->Str::random(10),
                        'username'=>Str::random(10).'@gmail.com',
                'email'=>$this->faker->email(),
                'password'=> Hash::make('password')
        
	]);
    }

}
