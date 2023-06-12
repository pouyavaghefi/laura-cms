<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(
            array(
                [
                    'usr_name' => 'vaghefi_p',
                    'usr_is_active' => '1',
                    'usr_is_admin' => '1',
                    'usr_email' => 'vagefipouya@yahoo.com   ',
                    'usr_email_verified_at' => Carbon::now(),
                    'usr_avatar' => '',
                    'usr_password' => Hash::make('Godfather1'),
                    'remember_token' => '',
                    'usr_last_login_at' => null,
                    'usr_creator_id' => null,
                    'usr_editor_id' => null,
                    'usr_deleted_at' => null,
                ],
            )
        );
    }
}
