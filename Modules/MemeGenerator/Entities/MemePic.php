<?php

namespace Modules\MemeGenerator\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemePic extends Model
{
    use HasFactory;
    protected $table = 'meme_pictures';
    protected $guarded = [];
}
