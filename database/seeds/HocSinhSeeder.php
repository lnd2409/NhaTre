<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
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

        $limit = 40;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('hocsinh')->insert([
                'hs_hoten' => $faker->name,
                'hs_noisinh' => $faker->address,
                'hs_ngaysinh' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'hs_gioitinh' => rand(0,1),
                'lh_id' => rand(1,5),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
