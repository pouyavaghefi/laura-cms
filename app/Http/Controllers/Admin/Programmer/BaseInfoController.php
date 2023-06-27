<?php

namespace App\Http\Controllers\Admin\Programmer;

use App\Http\Controllers\Controller;
use App\Models\BaseInfo;
use Illuminate\Http\Request;

class BaseInfoController extends Controller
{
    public function index()
    {
        $bases = BaseInfo::paginate(10);

        return view('admin.programmer.base.info', compact('bases'));
    }

    public function create()
    {
        return view('admin.programmer.base.form');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'bas_type' => 'required',
            'bas_value' => 'required',
            'bas_parent_id' => 'nullable',
            'bas_grand_parent_id' => 'nullable',
            'bas_extra_value' => 'nullable',
        ]);

        try {
            if (!empty($data['bas_grand_parent_id']) and !empty($data['bas_parent_id'])) {
                if ($data['bas_grand_parent_id'] == $data['bas_parent_id']) {
                    return redirect()->back()->withErrors(['والد پدر و پدر بزرگ نمی توانند برابر باشند']);
                }
            }

            BaseInfo::create([
                'bas_type' => $data['bas_type'],
                'bas_value' => $data['bas_value'],
                'bas_parent_id' => $data['bas_parent_id'],
                'bas_grand_parent_id' => $data['bas_grand_parent_id'],
                'bas_extra_value' => $data['bas_extra_value'],
            ]);

            return redirect()->route('adm.base.info')->withSuccess('اطلاعات پایه مورد نظر با موفقیت ساخته شد');
        }catch (\Exception $e) {
            $this->logError($e);

            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function delete($id)
    {
        try {
            BaseInfo::find($id)->delete();

            return redirect()->route('adm.base.info')->withSuccess('اطلاعات پایه مورد نظر با موفقیت حذف شد');
        }catch (\Exception $e) {
            $this->logError($e);

            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $base = BaseInfo::find($id);

        return view('admin.programmer.base.form', compact('base'));
    }

    public function update(Request $request,$id)
    {
        $data = $request->validate([
            'bas_type' => 'required',
            'bas_value' => 'required',
            'bas_parent_id' => 'nullable',
            'bas_grand_parent_id' => 'nullable',
            'bas_extra_value' => 'nullable',
        ]);

        try {
            if (!empty($data['bas_grand_parent_id']) and !empty($data['bas_parent_id'])) {
                if ($data['bas_grand_parent_id'] == $data['bas_parent_id']) {
                    return redirect()->back()->withErrors(['والد پدر و پدر بزرگ نمی توانند برابر باشند']);
                }
            }

            $base = BaseInfo::find($id);
            $base->bas_type = $data['bas_type'];
            $base->bas_value = $data['bas_value'];
            $base->bas_parent_id = $data['bas_parent_id'];
            $base->bas_grand_parent_id = $data['bas_grand_parent_id'];
            $base->bas_extra_value = $data['bas_extra_value'];
            $base->save();

            return redirect()->route('adm.base.info')->withSuccess('اطلاعات پایه مورد نظر با موفقیت ویرایش شد');
        }catch (\Exception $e) {
            $this->logError($e);

            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }
}
