<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userAdded = DB::table('users')->where('usr_name', 'vaghefi_p')->first();
        DB::table('members')->insert(
            array(
                [
                    'mbr_fname' => 'پویا',
                    'mbr_lname' => 'واقفی',
                    'mbr_en_fname' => 'Pouya',
                    'mbr_en_lname' => 'Vaghefi',
                    'mbr_nick_name' => 'وی',
                    'mbr_father_name' => 'نادرعلی',
                    'mbr_usr_id' => $userAdded->id,
                    'mbr_type_id' => null,
                    'mbr_cnt_id' => '1',
                    'mbr_prv_id' => '8',
                    'mbr_cit_id' => '98',
                    'mbr_gender_id' => '4',
                    'mbr_national_code' => '2281557693',
                    'mbr_birthday' => '1372/10/23',
                    'mbr_phone' => '0218868238',
                    'mbr_mobile' => '09128347349',
                    'mbr_email' => 'vagefipouya@yahoo.com',
                    'mbr_secondary_email' => 'pvagefi@yahoo.co.uk',
                    'mbr_postal_code' => null,
                    'mbr_address' => 'سعادت اباد',
                    'mbr_referer_code' => null,
                    'mbr_personal_code' => null,
                    'mbr_current_age' => '30',
                ],
            )
        );
    }
}
