<?php

namespace App\Http\Controllers\Admin\Profile;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Requests\Admin\Profile\ProfileDetailsUpdateRequest;
use App\Models\BaseInfo;
use App\Models\Location\City;
use App\Models\Location\Country;
use App\Models\Location\Province;
use App\Models\Member\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class ProfileController extends AdminController
{
    public function viewDetails()
    {
        $countries = Country::all();
        $provinces = Province::all();
        $cities = City::all();
        $genders = BaseInfo::where('bas_type','gender')->get();
        return view('admin.profile.details', compact('countries','cities','provinces','genders'));
    }

    public function updateDetails(ProfileDetailsUpdateRequest $request)
    {
        try {
            $inputData = $request->all();
            $wholeData = array_intersect_key($inputData, array_flip(Member::getTableColumns()));
            Member::where('mbr_usr_id', Auth::user()->id)->update($wholeData);

            return redirect()->back()->withSuccess('اطلاعات با موفقیت ویرایش گردید');
        }catch (\Exception $e) {
            $this->logError($e);

            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function changePassword(Request $request)
    {
        $data = $request->validate([
            'password_old' => 'required',
            'password_new' => 'required|same:password_new_confirmation|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/',
            'password_new_confirmation' => 'required',
        ]);

        try {
            $findUser = User::find(auth()->user()->id);
            if (Hash::check($data['password_old'], $findUser->usr_password)) {
                $findUser->usr_password = bcrypt($data['password_new']);
                $findUser->save();

                return redirect()->back()->withSuccess('رمز عبور شما با موفقیت بروزرسانی گردید');
            } else {
                return redirect()->back()->withErrors(['error' => 'رمز عبور فعلی شما با سوابق ما مطابقت ندارد']);
            }
        }catch (\Exception $e) {
            $this->logError($e);

            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }
}
