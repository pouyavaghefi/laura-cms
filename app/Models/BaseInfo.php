<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseInfo extends Model
{
    use HasFactory;
    protected $table = 'base_infos';
    protected $guarded = [];
    public $timestamps = false;
}
