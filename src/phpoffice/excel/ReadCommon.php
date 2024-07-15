<?php

namespace Gz\Utools\phpoffice\excel;

use PhpOffice\PhpSpreadsheet\IOFactory;

/**
 *  editor: gz,
 *  读取数据
 *  motto: 大自然的搬运工
 *  time: 2024/7/15
 */
trait ReadCommon
{
    public $data;
    //头部格式,返回是否需要映射键值
    public $key;


    private function _getData()
    {
        return $this->data;
    }

    private function _getKey()
    {
        return $this->key;
    }


    /**
     * 获取数据
     * @return mixed
     */
    public function getData($startLine = 1)
    {
        return $this->_mapData($startLine);
    }


    /**
     * @param $key 映射对应关系
     * @param $startLine  数据开始第几行
     * @return $this
     */
    public function setKey($key)
    {
        if (!empty($key)) $this->key = $key;
        return $this;
    }

    /**
     * 读取文件
     * @param string $filePath
     * @param string $headKey 头部key ['name','tel','year'....]
     * @return void
     */
    public function readFile(string $filePath)
    {

        $this->spreadsheet = IOFactory::load($filePath);
        $this->sheet = $this->sheet = $this->spreadsheet->getActiveSheet();
        $this->data = $this->sheet->toArray();
        return $this;
    }


    /***
     * 内部处理数据映射可以
     * @param  $startLine   开始第几行
     */
    private function _mapData($startLine = 1)
    {
        $key = $this->_getKey();
        $originData = $this->_getData();
        $data = is_array($originData) && count($originData) >= $startLine ? array_slice($originData, $startLine) : $originData;
        if (empty($key)) {
            return $data;
        }
        $result = [];
        foreach ($data as $k => $item) {
            $localItem = [];
            foreach ($key as $k1 => $item1) {
                $localItem[$item1] = $item[$k1];
            }
            $result[] = $localItem;
        }
        return $result;
    }


}