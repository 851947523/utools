<?php

namespace Gz\Utools\times\types;

use Gz\Utools\times\Timer;



/**
 * @mixin Common;
 */
/**
 *  查询类
 *  editor: gz,
 *  motto: 大自然的搬运工
 *  time: 2024-01-19
 */
trait Query
{

    //相对当前时间
    public function fromNow()
    {

    }

    //相对指定时间（前）
    public function from()
    {

    }

    //相对当前时间（后）
    public function toNow()
    {

    }

    //相对指定时间（后）
    public function to()
    {

    }

    //日历时间
    public function calendar()
    {

    }

    //获取当前月份包含的天数。
    public function daysInMonth()
    {
        $value = $this->unix($this->getValue())->getValue();
        $this->setValue(date('t', $value));
        return $this;

    }
    /**
     * 时间开始
     */
    public function startOf($type = 'd'){
        $val = date('Y-m-d 00:00:00');
        $time = $this->unix()->getValue();
        switch (strtolower($type)) {
            case 'y':
                $val = strtotime(date('Y-01-01 00:00:00',$time));
                break;
            case 'm':
                $val = strtotime(date('Y-m-01 00:00:00',$time));
                break;
            case 'd':
                $val = strtotime(date('Y-m-d 00:00:00',$time));
                break;
        }
        $this->setValue($val);
        return $this;
    }


    /**
     * 时间结束
     * @param $type
     * @return $this
     */
    public function endOf($type = 'd'){
        $val = date('Y-m-d 00:00:00');
        $time = $this->unix()->getValue();
        switch (strtolower($type)) {
            case 'y':
                $val = mktime(0,0,0,1,1,date('Y',$time)+1)-1;
                break;
            case 'm':
                $time = strtotime(date('Y-m-01',$time));
                $val = date("Y-m-d 23:59:59", strtotime("+1 month -1 day",$time));
                break;
            case 'd':
                $val = date('Y-m-d 23:59:59',$time);
                break;
        }
        $this->setValue($val);
        return $this;
    }

}