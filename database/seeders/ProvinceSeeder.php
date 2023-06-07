<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('provinces')->insert(
            array(
                [
                    'prv_name' => 'اردبیل',
                ],
                [
                    'prv_name' => 'اصفهان',
                ],
                [
                    'prv_name' => 'البرز',
                ],
                [
                    'prv_name' => 'ایلام',
                ],
                [
                    'prv_name' => 'آذربایجان شرقی',
                ],
                [
                    'prv_name' => 'آذربایجان غربی',
                ],
                [
                    'prv_name' => 'بوشهر',
                ],
                [
                    'prv_name' => 'تهران',
                ],
                [
                    'prv_name' => 'چهارمحال و بختیاری',
                ],
                [
                    'prv_name' => 'خراسان رضوی',
                ],
                [
                    'prv_name' => 'خراسان جنوبی',
                ],
                [
                    'prv_name' => 'خراسان شمالی',
                ],
                [
                    'prv_name' => 'خوزستان',
                ],
                [
                    'prv_name' => 'زنجان',
                ],
                [
                    'prv_name' => 'سمنان',
                ],
                [
                    'prv_name' => 'سیستان و بلوچستان',
                ],
                [
                    'prv_name' => 'فارس',
                ],
                [
                    'prv_name' => 'قزوین',
                ],
                [
                    'prv_name' => 'قم',
                ],
                [
                    'prv_name' => 'کردستان',
                ],
                [
                    'prv_name' => 'کرمان',
                ],
                [
                    'prv_name' => 'کرمانشاه',
                ],
                [
                    'prv_name' => 'کهگیلویه و بویراحمد',
                ],
                [
                    'prv_name' => 'گلستان',
                ],
                [
                    'prv_name' => 'گیلان',
                ],
                [
                    'prv_name' => 'لرستان',
                ],
                [
                    'prv_name' => 'مازندران',
                ],
                [
                    'prv_name' => 'مرکزی',
                ],
                [
                    'prv_name' => 'هرمزگان',
                ],
                [
                    'prv_name' => 'همدان',
                ],
                [
                    'prv_name' => 'یزد',
                ],
            )
        );
    }
}
