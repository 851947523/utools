<?php

namespace Gz\Utools\utils;

/**
 *  editor: gz,
 *  motto: 大自然的搬运工
 *  time: 2024/7/15
 */
class File
{


     /**
     * 根据路径获取文件信息
     *  ["dirname"]=>
     *          string(1) "."
     * ["basename"]=>
     *          string(18) "code1234569879.zip"
     * ["extension"]=>
     *              string(3) "zip"
     * ["filename"]=>
     *              string(14) "code1234569879"
     * @return array
     */
    public static function getFileInfo($filePath)
    {
        return pathinfo($filePath);
    }

    /**
     *  读取文件目录
     *  遍历文件目录，获取所有文件夹
     */
    public static function readDir($dir, &$results = array())
    {
        // 打开目录句柄
        $files = scandir($dir);
        foreach ($files as $key => $value) {
            $path = realpath($dir . DIRECTORY_SEPARATOR . $value);

            // 跳过 . 和 ..
            if (!is_dir($path)) {
                $results[] = $path;
            } elseif ($value != "." && $value != "..") {
                self::readDir($path, $results);
            }
        }
        return $results;

    }

    /**
     * 递归移除文件
     */
    public static function removeFilesByDir($dir)
    {
        // 打开目录句柄
        $files = scandir($dir);
        foreach ($files as $key => $value) {
            $path = realpath($dir . DIRECTORY_SEPARATOR . $value);
            if (!is_dir($path) && file_exists($path)) {
                unlink($path);
            } elseif ($value != "." && $value != "..") {
                self::removeFilesByDir($path);
            }
        }
        return true;
    }

    /**
     * 移除文件
     */
    public static function removeFile($filename)
    {
        if (file_exists($filename)) {
            unlink($filename);
        }
    }
}