<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Controller;
use App\Models\SiteInfo;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

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
        $data = $request->validate([
            'ste_name' => 'required',
            'ste_description' => 'nullable',
            'ste_url' => 'required',
            'ste_logo' => 'nullable',
            'ste_favicon' => 'nullable',
            'ste_email' => 'nullable',
            'ste_phone' => 'nullable',
            'ste_address' => 'nullable',
        ]);

        try {
            $siteInfo = SiteInfo::find($info);
            $siteInfo->ste_name = $data['ste_name'];
            $siteInfo->ste_description = $data['ste_description'];
            $siteInfo->ste_url = $data['ste_url'];
            $siteInfo->ste_email = $data['ste_email'];
            $siteInfo->ste_phone = $data['ste_phone'];
            $siteInfo->ste_address = $data['ste_address'];

            if ($request->hasFile('ste_logo')) {
                $logo = $request->file('ste_logo');
                $extension_logo = $logo->getClientOriginalExtension();
                $filename_logo = 'logo' . '.' . $extension_logo;
                $final_filename_logo = 'logo' . '.' . 'png';
                $path_logo = public_path('frontend/img/' . $filename_logo);
                $pngImageLogo = Image::make($logo)->encode('png', 100);
                $pngImageLogo->save($path_logo);
                $siteInfo->ste_logo = $final_filename_logo;
            }

            if ($request->hasFile('ste_favicon')) {
                $icon = $request->file('ste_favicon');
                $extension_icon = $icon->getClientOriginalExtension();
                $filename_icon = 'icon' . '.' . $extension_icon;
                $final_filename_icon = 'icon' . '.' . 'png';
                $path_icon = public_path('frontend/img/' . $filename_icon);
                $pngImageIcon = Image::make($icon)->encode('png', 100);
                $pngImageIcon->save($path_icon);
                $siteInfo->ste_favicon = $final_filename_icon;
            }

            if ($request->hasFile('ste_loader')) {
                $loader = $request->file('ste_loader');
                $extension_loader = $loader->getClientOriginalExtension();
                $filename_loader = 'loader' . '.' . $extension_loader;
                $final_filename_loader = 'loader' . '.' . 'gif';
                $path_loader = public_path('frontend/img/' . $filename_loader);
                $gifImageLoader = Image::make($icon)->encode('png', 100);
                $gifImageLoader->save($path_loader);
                $siteInfo->ste_loader = $final_filename_loader;
            }
            $siteInfo->save();

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
