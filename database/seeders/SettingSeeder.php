<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            'email'=>'hesenhesenov177@gmail.com',
            'phone'=>-'077-360-94-10',
            'youtube'=>'youtube.com',
            'insta'=>'instagram.com',
        ];
        Setting::create($data);
    }
}
