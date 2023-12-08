<?php

namespace App\Models\Menu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuLink extends Model
{
    use HasFactory;
    protected $table = 'menu_links';
    protected $guarded = [];

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'mel_men_id', 'id');
    }

    public function linkStatus()
    {
        if($this->mel_status == 1){
            return 1;
        }else{
            return 0;
        }
    }

    public function linkName()
    {
        if(empty($this->mel_label)){
            return $this->mel_icon;
        }else{
            return $this->mel_label;
        }
    }

    public function children()
    {
        return $this->hasMany(MenuLink::class, 'mel_parent_id', 'id');
    }

    public function subsets()
    {
        return $this->hasMany(MenuLink::class, 'mel_parent_id', 'id');
    }
}
