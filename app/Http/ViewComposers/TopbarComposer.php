<?php
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\SiteInfo;

class TopbarComposer
{
    public function compose(View $view)
    {
        $siteInfo = SiteInfo::first();

        $ste_name = $siteInfo->ste_name;
        $ste_words = explode(' ', $ste_name);
        $show_spans = count($ste_words) >= 2;
        list($word1, $word2) = $show_spans ? $ste_words : ['', ''];

        $view->with([
            'siteInfo' => $siteInfo,
            'showSpans' => $show_spans,
            'word1' => $word1,
            'word2' => $word2,
        ]);
    }
}
