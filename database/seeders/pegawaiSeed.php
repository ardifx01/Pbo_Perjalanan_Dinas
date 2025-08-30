<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;


class pegawaiSeed extends Seeder
{

    
    public function run(): void
    {
        for($i = 0; $i <= 10; $i++){
            $faker = Faker::create('id_ID');
            DB::table("pegawai")->insert([
                'no_induk' => $faker->numberBetween(0, 100),
                'nama' => $faker->name,
                'email'=> $faker->email,
                'no_telepon' => $faker->numberBetween(10, 99),
                'password' => 1234,
                'role' => $faker->randomElement(['admin', 'pegawai']),
            ]);
        }
    }
}
