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
        $m  = date("m",$time);
        switch (strtolower($type)) {
            case 'y':
                $val = strtotime(date("Y-{$m}-01 00:00:00",$time));
                break;
            case 'm':
                $val = strtotime(date("Y-{$m}-01 00:00:00",$time));
                break;
            case 'd':
                $val = strtotime(date("Y-$m-d 00:00:00",$time));
                break;
            case 'w':
                $val = date("Y-$m-d H:i:s", strtotime('this week monday 00:00:00'));
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
            case 'w':
                $val = date('Y-m-d H:i:s', strtotime('this week sunday 23:59:59'));
                break;
        }
        $this->setValue($val);
        return $this;
    }

}