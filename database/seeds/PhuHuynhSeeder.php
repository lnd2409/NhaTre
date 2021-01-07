<?php

use Illuminate\Database\Seeder;

class PhuHuynhSeeder extends Seeder
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
            DB::table('phuhuynh')->insert([
                'username' => 'phuhuynh'.$i,
                'password' => Hash::make(123),
                'ph_nghenghiep' => $faker->company,
                'ph_sdt' => $faker->phoneNumber,
                'ph_hoten' => $faker->name,
                'ph_diachi' => $faker->address,
                'ph_gioitinh' => rand(0,1),
                'ph_ngaysinh' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'nt_id' => 1
            ]);
        }
    }
}
