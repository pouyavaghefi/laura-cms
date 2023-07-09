<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Controller;
use App\Models\SiteInfo;
use Illuminate\Http\Request;

class SiteInfoController extends AdminController
{
    /**
     * tbl_name: site_info
     */
    public function index()
    {
        $infos = SiteInfo::all();
        return view('admin.settings.site.info', compact('infos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $info)
    {
        try {
            $data = $request->validate([
                'ste_name' => 'required',
                'ste_description' => 'required',
                'ste_url' => 'required',
                'ste_logo' => 'nullable',
                'ste_favicon' => 'nullable',
                'ste_email' => 'required',
                'ste_phone' => 'required',
                'ste_address' => 'required',
            ]);

            $siteInfo = SiteInfo::find($info);
            $siteInfo->update($data);

            return redirect()->back()->withSuccess('تغییرات با موفقیت اعمال شد');
        }catch (\Exception $e) {
            $this->logError($e);

            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SiteInfo $siteInfo)
    {
        //
    }
}
