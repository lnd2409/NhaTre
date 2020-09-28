<?php

use Illuminate\Database\Seeder;

class HocSinhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 10;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('hocsinh')->insert([
                'hs_hoten' => $faker->name,
                'hs_noisinh' => $faker->address,
                'hs_ngaysinh' => $faker->date($format = 'Y-m-d', $max = 'now'),
            ]);
        }
    }
}
