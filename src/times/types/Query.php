<?php

namespace Gz\Utools\times\types;

use app\lib\ajax\Ajax;
use app\lib\constMsg\Status;

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

}