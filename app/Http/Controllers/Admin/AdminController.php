<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
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

    protected function logError(\Exception $e)
    {
        $errorMessage = $e->getMessage();
        $errorStackTrace = $e->getTraceAsString();
        $errorPage = \Request::path();
        $errorMethod = \Request::method();
        $errorCreatorId = optional(Auth::user())->id;
        $errorIpAddress = \Request::ip();
        $errorUserAgent = \Request::header('User-Agent');
        $errorAdditionalData = json_encode([
//             Add any additional data you want to include in the JSON format
//            'user_id' => 123,
//            'request_data' => [
//                'param1' => 'value1',
//                'param2' => 'value2',
//            ],
//            'timestamp' => time(),
        ]);

        DB::table('error_logs')->insert([
            'err_message' => $errorMessage,
            'err_stack_trace' => $errorStackTrace,
            'err_page' => $errorPage,
            'err_method' => $errorMethod,
            'err_creator_id' => $errorCreatorId,
            'err_ip_address' => $errorIpAddress,
            'err_user_agent' => $errorUserAgent,
            'err_additional_data' => $errorAdditionalData,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
