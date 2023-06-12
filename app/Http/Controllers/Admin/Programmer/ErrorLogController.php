<?php

namespace App\Http\Controllers\Admin\Programmer;

use App\Http\Controllers\Controller;
use App\Models\ErrorLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ErrorLogController extends Controller
{
    public function index()
    {
        $errors = ErrorLog::paginate(10);

        return view('admin.programmer.error.log', compact('errors'));
    }

    public function info($id)
    {
        $error = ErrorLog::find($id);

        return view('admin.programmer.error.info', compact('error'));
    }

    public function destroy($id)
    {
        $error = ErrorLog::find($id);
        $error->delete();

        return redirect()->back()->withSuccess('ارور مورد نظر با موفقیت حذف گردید');
    }

    public function destroyAll()
    {
        DB::table('error_logs')->truncate();

        return redirect()->back()->withSuccess('اطلاعات این جدول با موفقیت پاکسازی شد');
    }

    public function destroyAllExceptStars()
    {
        $deletedCount = ErrorLog::where('err_starred', 0)->delete();

        return redirect()->back();
    }

    public function makeStar($id)
    {
        $error = ErrorLog::find($id);
        $error->err_starred = 1;
        $error->save();

        return redirect()->back()->withSuccess('ارور مورد نظر ستاره دار شد');
    }

    public function removeStar(Request $request)
    {
        $errorId = $request->input('id');

        $error = ErrorLog::find($errorId);
        $error->err_starred = 0;
        $error->save();

        return response()->json(['success' => true]);
    }
}
