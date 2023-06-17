<?php

namespace App\Http\Controllers\Admin\Menu;

use App\Http\Controllers\Controller;
use App\Models\Menu\Menu;
use App\Models\Menu\MenuLink;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::with('menuLinks')->paginate(10);
        return view('admin.menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.menus.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'men_name' => 'required',
            'men_description' => 'required',
            'men_position' => 'nullable',
        ]);

        $menuCreated = Menu::create([
            'men_name' => $data['men_name'],
            'men_description' => $data['men_description'],
            'men_creator_id' => auth()->user()->id,
            'men_position' => $data['men_position']
        ]);

        return redirect()->route('adm.menus.subsets',$menuCreated->id)->withSuccess('منوی شما با موفقیت ثبت شد');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        return view('admin.menus.form', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        $data = $request->validate([
            'men_name' => 'required',
            'men_description' => 'required',
            'men_position' => 'nullable',
        ]);

        $menu->men_name = $data['men_name'];
        $menu->men_description = $data['men_description'];
        $menu->men_position = $data['men_position'];
        $menu->save();

        return redirect()->route('adm.menus.index')->withSuccess('منوی مورد نظر با موفقیت ویرایش گردید');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->back()->withSuccess('منوی مورد نظر با موفقیت حذف گردید');
    }
}
