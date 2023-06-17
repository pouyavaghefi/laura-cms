<?php

namespace App\Http\Controllers\Admin\Menu;

use App\Http\Controllers\Controller;
use App\Models\Menu\Menu;
use App\Models\Menu\MenuLink;
use Illuminate\Http\Request;

class SubsetController extends Controller
{
    public function viewSubsets($id)
    {
        $menu = Menu::find($id)::with('menuLinks')->first();

        return view('admin.menus.subsets.subsets', compact('menu'));
    }

    public function createSubsets($id)
    {
        $menu = Menu::find($id)::with('menuLinks')->first();

        return view('admin.menus.subsets.form', compact('menu'));
    }

    public function storeSubsets(Request $request, $id)
    {
        $data = $request->validate([
            'mel_label' => 'nullable',
            'mel_url' => 'nullable',
            'mel_parent_id' => 'nullable',
            'mel_color' => 'nullable',
            'mel_hover_color' => 'nullable',
            'mel_icon' => 'nullable',
            'mel_url' => 'nullable',
        ]);

        MenuLink::create([
            'mel_label' => $data['mel_label'],
            'mel_url' => $data['mel_url'] ?? null,
            'mel_color' => $data['mel_color'] ?? null,
            'mel_hover_color' => $data['mel_hover_color'] ?? null,
            'mel_icon' => $data['mel_icon'] ?? null,
            'mel_show_icon_only' => $data['mel_show_icon_only'] ?? null,
            'mel_men_id' => $id,
            'mel_parent_id' => $data['mel_parent_id'] ?? null,
        ]);

        return redirect()->route('adm.menus.subsets', $id)->withSuccess('زیر مجموعه های این منو با موفقیت ساخته شد');
    }

    public function changeSubsetStatus(Request $request)
    {
        $subsetId = $request->input('subsetId');
        $subset = MenuLink::find($subsetId);
        if ($subset) {
            $subset->mel_status = !$subset->mel_status; // Toggle the status between 0 and 1
            $subset->save();

            // Return a success response
            return response()->json(['success' => true]);
        }

        // Return an error response if the subset is not found
        return response()->json(['success' => false, 'message' => 'Subset not found']);
    }

    public function editSubsets($menuId,$linkId)
    {
        $menu = Menu::find($menuId);
        $link = MenuLink::find($linkId);
        return view('admin.menus.subsets.form', compact('menu','link'));
    }

    public function updateSubsets(Request $request, $menuId,$linkId)
    {
        $data = $request->validate([
            'mel_label' => 'nullable',
            'mel_url' => 'nullable',
            'mel_parent_id' => 'nullable',
            'mel_color' => 'nullable',
            'mel_hover_color' => 'nullable',
            'mel_icon' => 'nullable',
        ]);

        $menu = Menu::find($menuId);
        $link = MenuLink::find($linkId);

        $link->mel_label = $data['mel_label'];
        $link->mel_url = $data['mel_url'];
        $link->mel_parent_id = $data['mel_parent_id'];
        $link->mel_color = $data['mel_color'];
        $link->mel_hover_color = $data['mel_hover_color'];
        $link->mel_icon = $data['mel_icon'];
        $link->save();

        return redirect()->route('adm.menus.subsets',$menuId)->withSuccess('زیرمنوی مورد نظر با موفقیت ویرایش گردید');
    }

    public function destroySubsets($menuId,$linkId)
    {
        MenuLink::where('mel_men_id',$menuId)->where('id',$linkId)->delete();
        return redirect()->back()->withSuccess('زیرمنوی مورد نظر با موفقیت حذف گردید');
    }
}
