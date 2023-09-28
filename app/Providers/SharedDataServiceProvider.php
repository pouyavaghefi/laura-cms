<?php

namespace App\Providers;

use App\Models\SiteInfo;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class SharedDataServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $siteInfo = SiteInfo::find(1);
            if (!$siteInfo) {
                throw new \Exception("SiteInfo record not found.");
            }
            $ste_name = $siteInfo->ste_name;
            $ste_url = $siteInfo->ste_url;
            $ste_words = explode(' ', $ste_name);
            $show_spans = count($ste_words) >= 2;
            list($word1, $word2) = $show_spans ? $ste_words : ['', ''];

            $view->with([
                'siteInfo' => $siteInfo,
                'steUrl' => $ste_url,
                'steName' => $ste_name,
                'showSpans' => $show_spans,
                'word1' => $word1,
                'word2' => $word2,
            ]);
        });
    }
}
