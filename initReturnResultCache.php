<?php

if (!function_exists('returnResultCache')) {
    function returnResultCache($timeSeconds, $cacheId, $callback, $arCallbackParams = '')
    {
        $obCache = new CPHPCache();
        $cachePath = '/' . SITE_ID . '/' . $cacheId;
        if ($obCache->InitCache($timeSeconds, $cacheId, $cachePath)) {
            $vars = $obCache->GetVars();
            $result = $vars['result'];
        } elseif ($obCache->StartDataCache()) {
            $result = $callback($arCallbackParams);
            $obCache->EndDataCache(array('result' => $result));
        }
        return $result;
    }
}
