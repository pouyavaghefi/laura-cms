<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use App\Models\BaseInfo;
use Illuminate\Http\Request;

class AuthUserController extends Controller
{
    public function viewAuthUser()
    {
        $bases = BaseInfo::where('bas_parent_id','auth');

        return view('admin.settings.auth.users', compact('bases'));
    }

    public function submitAuthUser(Request $request)
    {
        $data = $request->validate([
            'bg' => 'required',
            'logo' => 'required'
        ]);

        BaseInfo::where('bas_type','authUserBg')->update([
            'bas_value' => $data['bg']
        ]);

        BaseInfo::where('bas_type','authUserLogo')->update([
            'bas_value' => $data['logo']
        ]);

        return redirect()->route('adm.settings.auth.users')->withSuccess('تغییرات با موفقیت اعمال شد');
    }
}
