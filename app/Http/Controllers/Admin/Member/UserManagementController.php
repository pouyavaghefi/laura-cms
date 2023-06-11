<?php

namespace App\Http\Controllers\Admin\Member;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserManagementController extends AdminController
{
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
