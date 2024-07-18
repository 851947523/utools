<?php

namespace Gz\Utools\phpoffice;


use Gz\Utools\Instance\Instance;
use Gz\Utools\phpoffice\excel\BuildCommon;
use Gz\Utools\phpoffice\excel\Common;
use Gz\Utools\phpoffice\excel\ReadCommon;
use Gz\Utools\phpoffice\interfaces\ExcelInterfaces;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

/**
 *  editor: gz,
 *  motto: 大自然的搬运工
 *  time: 2024-01-13
 */
class Excel
{
    use Instance;
    use Common;
    use ReadCommon;
    use BuildCommon;

    /**
     * @param $options
     * @param $cache
     * @return ExcelInterfaces
     * @throws \Exception
     */
    public static function instance($options = "",$cache = false)
    {
        $classFullName = self::getClassName();
        if (!$cache) {
            //清楚缓存
            if (isset(self::$instance[$classFullName])) {
                unset(self::$instance[$classFullName]);
            }
        }
        self::$options = $options;
        if (!isset(self::$instance[$classFullName]) && empty(self::$instance[$classFullName])) {
            if (!class_exists($classFullName, false)) {
                throw new \Exception('"' . $classFullName . '" was not found !');
            }
            $instance = self::$instance[$classFullName] = new static();
            return $instance;
        }
        return self::$instance[$classFullName];
    }


    public function saveFile(string $filename): string
    {
        if (empty($spreadsheet)) {
            $spreadsheet = $this->spreadsheet;
        }
        if (empty($spreadsheet)) return '';
        ob_end_clean(); //清除缓冲区,避免乱码
        //将输出重定向到客户端的web浏览器
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        //如果浏览器为IE9
        header('Cache-Control: max-age=1');
        //如果通过SSL向IE提供服务
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save($filename);
        return $filename;
        //$writer->save('php://output');
    }




    /**
     * sheet值
     * @param $sheetNum
     * @return void
     */
    public function init($sheetNum = 1): Excel
    {
        $this->spreadsheet = new Spreadsheet();
        $this->sheet = $this->spreadsheet->getActiveSheet();
        return $this;
    }
}