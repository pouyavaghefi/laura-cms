<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ErrorLog extends Model
{
    use HasFactory;
    protected $table = 'error_logs';
    protected $guarded = [];

    public function errMaker()
    {
        return $this->hasOne(User::class, 'id', 'err_creator_id');
    }
}
