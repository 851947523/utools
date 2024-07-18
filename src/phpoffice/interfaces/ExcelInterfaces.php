<?php

namespace Gz\Utools\phpoffice\interfaces;

/**
 *  excel 类使用说明
 */
abstract class ExcelInterfaces
{

    /**
     * 保存excel为文件
     *
     * @param $filename 上传的文件路径包含名字
     * @return void
     */
    public function saveFile($filename)
    {
    }

    /**
     * 初始化
     *
     * sheet值
     * @param $sheetNum
     * @return self
     */
    public function init($sheetNum = 1)
    {
    }


    /**
     * 初始化数据
     *
     * @param int $spreadsheet phpoffice,excel sheet
     * @param int $startLine 开始行
     * @param array $arrSet //设置行  ['title'=>'标题','key'=>['key1','key2],(多维数组可以是),'headStyle'=> [头部样式，同style],style=>
     *'font' => [
     *  'bold' => true,
     *  'color' => ['rgb' => 'FF0000'],
     *  'size' => 12,
     *  'name' => 'Verdana'
     * ],
     * 'borders' => [
     *  'outline' => [
     *  'borderStyle' => Border::BORDER_THICK,
     *  'color' => ['argb' => 'FFFF0000'],
     * ],
     * ],
     * 'fill' => [
     *  'fillType' => Fill::FILL_GRADIENT_LINEAR,
     *  'rotation' => 90,
     *  'startColor' => ['argb' => 'FFA0A0A0'],
     *  'endColor' => ['argb' => 'FFFFFFFF'],
     * ],
     * 'alignment' => [
     *  'horizontal' => Alignment::HORIZONTAL_CENTER,
     *  'vertical' => Alignment::VERTICAL_CENTER,
     * ],
     * @param array $data //导出数据
     * @return self
     */
    public function buildData(int $startLine = 1, array $arrSet = [], array $data = []): Excel
    {

    }

    /**
     * 根据当前列数，获取对应的A,b,c ....AA
     *
     * @param int $num
     * @return string
     */
    function numToExcelLetter(int $num)
    {
    }


    /**
     * 设置标题
     *
     * @param $title
     * @return $this
     */
    public function setTitle($title)
    {
    }

    /**
     * 设置dir,若果不存在创建dir
     *
     * @param $dir
     * @return $this
     */
    public function setDir()
    {
    }



    /**
     * 获取最终读取excel数据
     *
     * @param $startLine   //第几行开始处理
     * @return void
     */
    public function getData($startLine = 1)
    {
    }


    /**
     * 读取文件
     *
     *
     * @param string $filePath
     * @param string $headKey 头部key ['name','tel','year'....]
     * @return $this
     */
    public function readFile(string $filePath)
    {}

    /**
     * 读取excel数据设置键值对应
     *
     * @param array $key  ['title','name'...]
     * @return $this
     */

    public function setKey($key)
    {

    }
}