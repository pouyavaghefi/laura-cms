<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('base_infos')->insert(
            array(
                [
                    'bas_type' => 'unknown',
                    'bas_value' => 'نامشخص',
                ],
                [
                    'bas_type' => 'gender',
                    'bas_value' => 'جنسیت',
                ],
                [
                    'bas_type' => 'gender',
                    'bas_value' => 'زن',
                ],
                [
                    'bas_type' => 'gender',
                    'bas_value' => 'مرد',
                ],
                [
                    'bas_type' => 'mediaLibrary',
                    'bas_value' => 'کلی',
                ],
                [
                    'bas_type' => 'menuPosition',
                    'bas_value' => 'بالا',
                ],
                [
                    'bas_type' => 'menuPosition',
                    'bas_value' => 'وسط',
                ],
                [
                    'bas_type' => 'menuPosition',
                    'bas_value' => 'پایین',
                ],
            )
        );
    }
}
