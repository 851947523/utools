<?php

namespace Gz\Utools\times\types;


use Gz\Tp6Common\common\consts\Status;
use Gz\Tp6Common\common\exception\Error;

/**
 *  editor: gz,
 *  motto: 大自然的搬运工
 *  time: 2024-01-18
 */
trait Common
{

    public $format = ''; //格式化

    /**
     * 吧y-m-d  搭配时间转换成系统 指定的格式   y=> 'year'
     * @param $number 时间
     * @param $type  y m  d  h  i  s
     * @return void   ` 1 day` or `1 days`
     */
    public function typeToSystemType($number = 1, $type = 'd')
    {
        $type = strtolower($type);
        $typeArr = $this->getTypesArr();
        if (!isset($typeArr[$type])) throw new Error(Status::noKey());
        $result = $number == 1 ? "$number " . $typeArr[$type] : "$number " . $typeArr[$type] . "s";
        return $result;

    }

    /**
     * 格式化时间戳
     * @param $format  'Y-m-d H:i:s'
     * @return self
     */
    public function format($format = 'Y-m-d H:i:s')
    {
        $this->format = $format;
        $value = $this->getValue();
        $value = is_numeric($value) ? date($this->format,$value) : date($format,strtotime($value));
        $this->setValue($value);
        return $this;

    }


    /**
     * 获取类型
     * @return string[]
     */
    private function getTypesArr()
    {
        return ['y' => 'year', 'm' => 'month', 'd' => 'day', 'h' => 'hour', 'i' => 'minute', 's' => 'second'];
    }

    public function utc()
    {
        $value = $this->getValue();
        $value = is_numeric($value) ? $value : strtotime($value);
        $value = gmdate(DATE_ATOM, $value);
        $this->setValue($value);
        return $this;
    }

    /**
     * 获取value值
     * @return float|int|string
     */
    private function getValue()
    {
        if (empty($this->value)) {
            $this->setValue(time());
        }
        return $this->value;
    }

    private function setValue($value)
    {

        $this->value = $value;
        return $this;
    }

}