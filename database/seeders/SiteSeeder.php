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
        DB::table('site_info')->insert(
            array(
                [
                    'ste_name' => 'دی گستر',
                    'ste_url' => 'https://daygostar.com/',
                    'ste_description' => '',
                    'ste_logo' => '',
                    'ste_favicon' => '',
                    'ste_email' => '',
                    'ste_phone' => '',
                    'ste_address' => '',
                    'ste_main' => '1',
                ],
            )
        );
    }
}
