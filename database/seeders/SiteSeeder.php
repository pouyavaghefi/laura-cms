<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('site_infos')->insert(
            array(
                [
                    'ste_name' => 'بات رایدر',
                    'ste_url' => 'https://botrider.ir/',
                    'ste_description' => '',
                    'ste_logo' => '',
                    'ste_favicon' => '',
                    'ste_loader' => '',
                    'ste_email' => '',
                    'ste_phone' => '',
                    'ste_address' => '',
                    'ste_main' => '1',
                ],
            )
        );
    }
}
