<?php

namespace App\Http\Controllers\Admin\Member;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Controller;
use App\Models\BaseInfo;
use App\Models\Location\City;
use App\Models\Location\Country;
use App\Models\Location\Province;
use App\Models\Member\Member;
use Illuminate\Http\Request;
use App\Models\User;

class UserManagementController extends AdminController
{
    public function addMemberView()
    {
        $countries = Country::all();
        $provinces = Province::all();
        $cities = City::all();
        $genders = BaseInfo::where('bas_type','gender')->get();
        $mtypes = BaseInfo::where('bas_type','memberType')->get();
        return view('admin.members.add', compact('countries','cities','provinces','genders','mtypes'));
    }

    public function addMember(Request $request)
    {
        $data = $request->validate([
            'usr_name' => 'required',
            'usr_is_active' => 'required',
            'usr_is_admin' => 'required',
            'usr_email_verified_at' => 'required',
            'mbr_type' => 'required',
        ]);

        if(is_numeric($data['usr_name'])){
            if($data['usr_is_admin'] == 1){
                return redirect()->back()->withErrors('در صورت انتخاب اکانت از نوع ادمین، نام کاربری بایستی با حروف باشد');
            }else {
                $username = $data['usr_name'];
            }
        }else{
            $username = $data['usr_name'];
        }

        if($data['usr_email_verified_at'] == "linksent" OR $data['usr_email_verified_at'] == "notverified"){
            $usr_email_verified_at = null;
        }else{
            $usr_email_verified_at = now();
        }

        $user = User::create([
            'usr_name' => $username,
            'usr_is_active' => $data['usr_is_active'],
            'usr_is_admin' => $data['usr_is_admin'],
            'usr_email' => $data['usr_email'],
            'usr_email_verified_at' => $usr_email_verified_at
        ]);

        Member::create([
            'mbr_usr_id' => $user->id,
            'mbr_type_id' => $data['mbr_type'],
            'mbr_mobile' => is_numeric($username) ? $username : null,
        ]);

        return redirect()->route('adm.profile.details', $user->id)->withSuccess('مرحله اول اضافه کردن کاربر با موفقیت انجام شد');
    }

    public function changeActivation(Request $request)
    {
        try {
            $userId = $request->input('userId');
            $isActive = $request->input('isActive');

            $user = User::find($userId);
            if ($user) {
                $user->usr_is_active = $isActive ? 0 : 1;
                $user->save();

                // Return a success response, if needed
                return response()->json(['success' => true]);
            }

            // Return an error response if the user is not found
            return response()->json(['success' => false, 'message' => 'User not found']);
        }catch (\Exception $e) {
            $this->logError($e);

            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }
}
