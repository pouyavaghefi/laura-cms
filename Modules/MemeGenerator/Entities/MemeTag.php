<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemeTag extends Model
{
    use HasFactory;
    protected $table = 'meme_tags';
    protected $guarded = [];
}
