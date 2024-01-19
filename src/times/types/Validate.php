<?php

namespace Gz\Utools\times\types;

use app\lib\ajax\Ajax;
use app\lib\constMsg\Status;

/**
 *  验证类
 *  editor: gz,
 *  motto: 大自然的搬运工
 *  time: 2024-01-19
 */
trait Validate
{
    /**
     * 验证时间
     * @param $format  验证格式
     * @return void
     */
    public function isValid($format = '')
    {
        if (!$this->value) return false;
        if (empty($format)) {
            $result = strtotime($this->value);
            return $result;
        }
        $result = date($format, strtotime($this->value));
        $defaultTime = '1970-01-01';
        $isInclude = strlen($result) > strlen($defaultTime)
            ? strpos($result, $defaultTime)
            : strpos($defaultTime, $result);

        return $result && $isInclude === false ? true : false;
    }

    //对象的年份是否是闰年。
    public function isLeapYear()
    {
        $value = $this->unix();
        var_dump($value);exit;

    }

    //是否在另一个提供的日期时间之前。
    public function isBefore($time = '')
    {

    }

    //供的日期时间相同
    public function isSame()
    {

    }

    //对象是否在另一个提供的日期时间之后。
    public function isAfter()
    {

    }

    //对象是否和另一个提供的日期时间相同或在其之前。
    public function isSameOrBefore()
    {

    }

    //对象是否和另一个提供的日期时间相同或在其之后。
    public function isSameOrAfter()
    {

    }

    //对象是否在其他两个的日期时间之间。
    public function isBetween()
    {

    }
}