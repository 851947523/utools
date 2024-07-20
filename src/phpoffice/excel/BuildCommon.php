<?php

namespace Gz\Utools\phpoffice\excel;


use Gz\Utools\phpoffice\Excel;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;

/** 普通数据生成
 *  editor: gz,
 *  motto: 大自然的搬运工
 *  time: 2024/7/13
 */
trait BuildCommon
{



    /**
     * @param int $spreadsheet phpoffice,excel sheet
     * @param int $startLine 开始行
     * @param array $arrSet //设置行
     * ['title' => '标题', 'key' => ['title'],
     * 'width'=> 25,
     * 'height'=> 20,
     * 'headHeight'=> 23,
     * 'headStyle'=> [
     * 'font' => [
     * 'bold' => true,
     * 'size' => 14,
     * 'color' => ['rgb' => 'FFFFFF'],
     * ],
     * 'alignment' => [
     * 'horizontal' => Alignment::HORIZONTAL_CENTER,
     * ],
     * 'fill' => [
     * 'fillType' => Fill::FILL_SOLID,
     * 'startColor' => ['rgb' => '428bca'],
     * ],
     * ]
     * @param array $data //导出数据
     * @return void
     */
    public function buildData(int $startLine = 1, array $arrSet = [], array $data = []): Excel
    {
        foreach ($arrSet as $key1 => $item1) {
            //设置头部
            $lineItem1 = $this->numToExcelLetter($key1 + 1);
            $this->sheet->setCellValue($lineItem1 . $startLine, $item1['title'] ?? 1);

        }
        $startLine = $startLine + 1;
        foreach ($data as $k => $item) {
            $columnNum = $k + $startLine;
            foreach ($arrSet as $key1 => $item1) {
                $lineItem1 = $this->numToExcelLetter($key1 + 1);
                $value = $this->handleArrSetKeyToKey($item, $item1['key'] ?? []);
                $this->sheet->setCellValue($lineItem1 . $columnNum, $value . '');
                if (!empty($item1['style'])) {
                    $this->sheet->getStyle($lineItem1 . $columnNum)->applyFromArray($item1['style']);
                }
                if (!empty($item1['width'])) {
                    $this->sheet->getColumnDimension($lineItem1)->setWidth($item1['width']);
                }
                if (!empty($item1['setAutoSize'])) {
                    $this->sheet->getColumnDimension($lineItem1)->setAutoSize($item1['setAutoSize']);
                }
                if (!empty($item1['height'])) {
                    $this->sheet->getRowDimension($columnNum)->setRowHeight($item1['height']);
                }

                if (!empty($item1['headHeight'])) {
                    $this->sheet->getRowDimension(1)->setRowHeight($item1['headHeight']);
                }
                if (!empty($item1['headStyle'])) {
                    //设置头部样式
                    $this->sheet->getStyle($lineItem1 . 1)
                        ->applyFromArray($item1['headStyle']);
                }
            }
        }
        return $this;
    }


    /**
     * 处理设置key => 换算成 $att[$key1][$key2],根据键值多维数组 获取键值对应的excel值
     * @return void
     */
    private
    function handleArrSetKeyToKey($item, $key = [])
    {
        $result = '';
        $result = $item;
        foreach ($key as $value) {
            if (isset($result[$value])) {
                $result = $result[$value];
            } else {
                $result = '';
            }
        }
        return $result ?: "";
    }

}