<?php

namespace Gz\Utools\phpoffice\excel;

use app\lib\ajax\Ajax;
use app\lib\constMsg\Status;
use Gz\Tp6Common\common\classes\Instance\Instance;
use Gz\TpCommon\exception\Error;

/**
 *  excel通用方法
 *  editor: gz,
 *  motto: 大自然的搬运工
 *  time: 2024-01-13
 */
trait Common
{
    public $spreadsheet;
    public $sheet;


    /**
     * Notes: 数字生成字母，1=A开始
     * @param int $num
     * @return string
     */
    function numToExcelLetter(int $num): string
    {
        $result = '';
        while ($num > 0) {
            $mod = $num % 26;
            $num = (int)($num / 26);
            if ($mod == 0) {
                $num--;
                $temp = 'Z' . $result;
            } else {
                $temp = chr(64 + $mod) . $result;
            }
            $result = $temp;
        }
        return $result;
    }

    public function setTitle(?string $title)
    {
        if (empty($this->sheet) || empty($this->spreadsheet)) throw new Error('请先初始化init');
        $this->spreadsheet->getproperties()->setTitle($title);
        return $this;
    }

    /**
     * 设置dir
     */
    public function setDir(?string $dir)
    {
        if (empty($dir)) return $this;
        if (!is_dir($dir)) {
            mkdir($dir);
        }
        return $this;

    }

    /**
     * 获取exceldata
     */

}