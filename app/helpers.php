<?php
if(!function_exists('digits_persian')){
    function digits_persian($string){
        $persian = ['۰','۱','۲','۳','۴','۵','۶','۷','۸','۹'];
        $num = range(0,9);
        $string = str_replace($num,$persian,$string);

        return $string;
    }
}

if(!function_exists('ste_name')){
    function ste_name($siteInfo){
        return $siteInfo->ste_name;
    }
}

if(!function_exists('ste_url')){
    function ste_url($siteInfo){
        return $siteInfo->ste_url;
    }
}

if(!function_exists('getFileSizeFormat')){
    function getFileSizeFormat($size)
    {
        $units = ['Bytes', 'KB', 'MB', 'GB', 'TB'];

        $i = 0;
        while ($size >= 1024 && $i < count($units) - 1) {
            $size /= 1024;
            $i++;
        }

        return round($size, 2) . ' ' . $units[$i];
    }
}
