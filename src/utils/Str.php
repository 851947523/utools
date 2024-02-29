<?php

namespace Gz\Utools\utils;

/**
 * 字符串操作类
 */
class Str
{

    /**
     * url 型只字符串参数转数组 http://****.com/id?1&n=3...
     * @return Array
     */
    public static function paraseUrlToArray(string $url): array
    {
        $result = [];
        $parseArr = parse_url($url);
        $query = $parseArr['query'] ?? "";
        $queryArr = explode('&', $query);
        if ($queryArr) {
            foreach ($queryArr as $v) {
                $v = preg_replace("/amp;/", '', $v);
                if ($v) {
                    $vArr = explode('=', $v);
                    $result[$vArr[0]] = $vArr[1];
                }
            }
        }
        return $result;
    }

}