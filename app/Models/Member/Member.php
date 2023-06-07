<?php

namespace App\Models\Member;

use App\Models\Location\Country;
use App\Models\Location\Province;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class Member extends Model
{
    use HasFactory;
    protected $table = 'members';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'mbr_usr_id', 'id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'mbr_cnt_id', 'id');
    }

    public function city()
    {
        return $this->belongsTo(Country::class, 'mbr_cit_id', 'id');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'mbr_prv_id', 'id');
    }

    public static function getTableColumns()
    {
        return Schema::getColumnListing((new self())->getTable());
    }
}
