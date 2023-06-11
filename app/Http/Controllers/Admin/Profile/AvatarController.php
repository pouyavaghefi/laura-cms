<?php

namespace App\Http\Controllers\Admin\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class AvatarController extends Controller
{
    public function showAvatar()
    {
        $avatarPath = "adm/avatars/" . auth()->user()->usr_name . ".jpg";
        $defaultAvatarPath = public_path("assets/img/adm.jpg");

        if (Storage::exists($avatarPath)) {
            $contents = Storage::get($avatarPath);
        } else {
            $contents = file_get_contents($defaultAvatarPath);
        }

        $headers = ['content-type' => 'image/jpeg'];
        return response($contents, 200, $headers);
    }

    public function uploadAvatar(Request $request)
    {
        $data = $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Add more validation rules as needed
        ]);

        try {
            $file = $data['avatar'];
            $filename = Auth::user()->usr_name . ".jpg";

            $avatar = Storage::get("adm/avatars/" . auth()->user()->usr_name . ".jpg");
            if (is_null($avatar)) {
                $file->storeAs('adm/avatars', $filename);
            } else {
                Storage::delete("adm/avatars/" . auth()->user()->usr_name . ".jpg");
                $file->storeAs('adm/avatars', $filename);
            }

            return redirect()->back()->withSuccess('عکس پروفایل با موفقیت ویرایش گردید');
        }catch (\Exception $e) {
            $this->logError($e);

            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function deleteAvatar()
    {
        try {
            $filename = auth()->user()->usr_name . '.jpg';
            $path = 'adm/avatars/' . $filename;

            if (Storage::exists($path)) {
                Storage::delete($path);
                return redirect()->back()->withSuccess('عکس پروفایل با موفقیت حذف شد');
            } else {
                return redirect()->back()->withErrors(['errors' => 'عکس پروفایل پیدا نشد']);
            }
        } catch (\Exception $e) {
            $this->logError($e);

            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }
}
