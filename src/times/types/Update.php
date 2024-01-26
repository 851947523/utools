<?php

namespace Gz\Utools\times\types;

use Gz\Tp6Common\common\classes\Instance\Instance;
use Gz\Tp6Common\common\consts\Status;
use Gz\Tp6Common\common\exception\Error;
use Gz\Utools\times\types\Common;
use Gz\Utools\times\types\Diff;

/**
 *  更新类
 *  editor: gz,
 *  motto: 大自然的搬运工
 *  time: 2024-01-13
 */
trait Update
{


    /**
     * 时间增加
     * @param $number  增加的具体时间
     * 加的类型 y:年 m:月 d:日 h:时 i:分 s:秒
     * @return self
     */
    public function inc($number = 0, $type = 'd')
    {
        if (empty($number) && $number !== 0) throw new Error(Status::dataEmpty());
        $addFormat = '+' . $this->typeToSystemType($number, $type);
        $value = $this->getValue();
        if (empty($value)) {
            $value = strtotime($addFormat);
        } else {
            $value = is_numeric($value) && strlen($value) >= 10 ?
                strtotime($addFormat, $value) :
                $this->setValue(strtotime($addFormat, strtotime($value)))->format()->getValue();
        }
        $this->setValue($value);
        return $this;
    }


    /**
     * 时间减少
     * @param $number  增加的具体时间
     * 加的类型 y:年 m:月 d:日 h:时 i:分 s:秒
     * @return self
     */
    public function dec($number = 0, $type = 'd')
    {
        if (empty($number) && $number !== 0) throw new Error(Status::dataEmpty());
        //格式化后的累计 1 day  or 2 days
        $addFormat = '-' . $this->typeToSystemType($number, $type);
        $value = $this->getValue();
        if (empty($value)) {
            $value = strtotime($addFormat);
        } else {
            $value = is_numeric($value) && strlen($value) >= 10 ?
                strtotime($addFormat, $value) :
                $this->setValue(strtotime($addFormat, strtotime($value)))->format()->getValue();

        }
        $this->setValue($value);
        return $this;
    }




    /**
     * 转unix
     * @return self
     */
    public function unix()
    {
        $value = $this->getValue();
        $value = is_numeric($value) ? $value : strtotime($value);
        $this->setValue($value);
        return $this;
    }


}