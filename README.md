# bitrix-CPHPCache-wrapper
Удобная обертка для кеширования в Битриксе

Пример использования:  
```php
<?
function workWithDB($itemId, $town) {

    //подключим обертку
    require_once $_SERVER["DOCUMENT_ROOT"] . "/local/helpers/initReturnResultCache.php";

    //функция, результат которой кешируем
    function cached($p) {
        $db = myClass();
        $data = $db->fetch($p["id"], $p["filter"]);
        return $data;
    }

    //параметры кеша
    $params = [
        "id" => 10134,
        "filter" => ["ACTIVE" => "Y"],
    ];
    $cachedTime = 3600;
    $cacheId = 'dbResult_' . implode("_", $params);

    //получение кеша
    $result = returnResultCache($cachedTime, $cacheId, 'cached', $params);

    return $result;
}
```
