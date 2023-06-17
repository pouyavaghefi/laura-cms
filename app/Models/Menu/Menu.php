<?php

namespace App\Models\Menu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $table = 'menus';
    protected $guarded = [];

    public function menuLinks()
    {
        return $this->hasMany(MenuLink::class, 'mel_men_id', 'id');
    }
}
