<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class MonHocSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $monHoc = [
            [
                'mh_tenmon' => 'Ngôn ngữ – nghe, nói và làm quen với đọc và viết',
                'nt_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'mh_tenmon' => 'Toán học – tập đếm, chọn lọc, phân loại và đo lường',
                'nt_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'mh_tenmon' => 'Âm nhạc và chuyển động – chơi đùa cùng các bài hát & ngón tay',
                'nt_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'mh_tenmon' => 'Hoạt động của các nhóm lớn – chạy, nhảy và leo trèo',
                'nt_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'mh_tenmon' => 'Hoạt động kỹ năng – cắt, vẽ, nặn bột',
                'nt_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'mh_tenmon' => 'Khoa học xã hội – môi trường gần và xa xung quanh mình',
                'nt_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'mh_tenmon' => 'Chăm sóc, quan tâm và nhận thức về thiên nhiên',
                'nt_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'mh_tenmon' => 'Công nghệ',
                'nt_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'mh_tenmon' => 'Chương trình phát triển cảm xúc và kỹ năng xã hội',
                'nt_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ];

        $addSubject = DB::table('monhoc')->insert($monHoc);
    }
}
