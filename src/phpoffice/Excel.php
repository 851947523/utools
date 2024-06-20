<?php

namespace Gz\Utools\phpoffice;


use Gz\Utools\Instance\Instance;
use Gz\Utools\phpoffice\excel\Common;
use PhpOffice\PhpSpreadsheet\IOFactory;

/**
 *  editor: gz,
 *  motto: 大自然的搬运工
 *  time: 2024-01-13
 */
class Excel
{
    use Instance;
    use Common;

    public function index()
    {
        echo 'index';
    }

    public function saveFile($spreadsheet,$filename)
    {
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
}