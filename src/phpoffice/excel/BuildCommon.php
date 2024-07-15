<?php

namespace Gz\Utools\phpoffice\excel;


use Gz\Utools\phpoffice\Excel;

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
     * @param array $arrSet //设置行  ['title'=>'标题','key'=>['key1','key2](多维数组可以是),'headStyle'=> [头部样式，同style],style=>
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
                $this->sheet->setCellValue($lineItem1 . $columnNum, $value);
                if (!empty($item1['style'])) {
                    $this->sheet->getStyle($lineItem1 . $columnNum)->applyFromArray($item1['style']);
                }
                if (!empty($item1['headStyle'])) {
                    //设置头部样式
                    $this->sheet->getStyle($lineItem1 . $startLine)->applyFromArray($item1['style']);
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
    function handleArrSetKeyToKey(array $item, array $key = []): string
    {
        $result = null;
        foreach ($key as $value) {
            if (isset($item[$value])) {
                $result = $item[$value];
            }
        }
        return $result ?: "";
    }

}