<?php

use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $dataKhoiHoc = [
            [
                'kh_tenkhoi' => 'Mầm',
                'kh_dotuoi' => '3-4'
            ],[
                'kh_tenkhoi' => 'Chồi',
                'kh_dotuoi' => '4-5'
            ],[
                'kh_tenkhoi' => 'Lá',
                'kh_dotuoi' => '5-6'
            ],
        ];
        DB::table('khoihoc')->insert($dataKhoiHoc);

        $dataTruongHoc = [
            [
                'nt_tentruong' => 'Mầm non Thanh xuân',
                'nt_diachi' => '132 Mậu Thân',
                'nt_sodienthoai' => '0909009008',
                'nt_email' => 'thanhxuan@edu.tx.vn',
                'username' => 'thanhxuan',
                'password' => Hash::make('123'),
                'nt_trangthai' => 1
            ],
            [
                'nt_tentruong' => 'Mầm non Cửu Long',
                'nt_diachi' => '132 Nguyễn Văn Cừ',
                'nt_sodienthoai' => '0909009008',
                'nt_email' => 'cuulong@edu.tx.vn',
                'username' => 'cuulong',
                'password' => Hash::make('123'),
                'nt_trangthai' => 1
            ],
        ];

        DB::table('nhatruong')->insert($dataTruongHoc);
    }
}
