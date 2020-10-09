<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class GiaoVienSeeder extends Seeder
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
            DB::table('giaovien')->insert([
                'username' => 'giaovien'.$i,
                'password' => Hash::make(123),
                'gv_ten' => $faker->company,
                'gv_sdt' => $faker->phoneNumber,
                'gv_diachi' => $faker->address,
                'gv_ngaysinh' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'gv_gioitinh' => rand(0,1),
                'nt_id' => 1,
                // 'lh_id' => rand('')
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
