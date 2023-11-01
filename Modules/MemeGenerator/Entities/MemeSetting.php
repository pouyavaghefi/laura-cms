<?php

namespace Modules\MemeGenerator\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemeSetting extends Model
{
    use HasFactory;
    protected $table = 'meme_settings';
    protected $guarded = [];
}
