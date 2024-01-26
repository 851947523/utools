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
        $value = $this->unix()->getValue();
        $time = mktime(20,20,20,2,1,date('Y',$value));//取得一个日期的 Unix 时间戳;
        if (date("t",$time)== 29){ //格式化时间，并且判断2月是否是29天；
            return true;
        }else{
            return false;
        }

    }

    //是否在另一个提供的日期时间之前。
    public function isBefore($time = '')
    {
        $startTime = $this->unix()->getValue();
        $endTime = is_string($time) ? strtotime($time) : $time;
        return $startTime <= $endTime;

    }

    //供的日期时间相同
    public function isSame()
    {
        $startTime = $this->unix()->getValue();
        $endTime = is_string($time) ? strtotime($time) : $time;
        return $startTime == $endTime;
    }

    //对象是否在另一个提供的日期时间之后。
    public function isAfter()
    {
        $startTime = $this->unix()->getValue();
        $endTime = is_string($time) ? strtotime($time) : $time;
        return $startTime >= $endTime;

    }

}