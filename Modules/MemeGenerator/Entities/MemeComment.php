<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemeComment extends Model
{
    use HasFactory;
    protected $table = 'meme_comments';
    protected $guarded = [];
}
