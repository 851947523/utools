<?php

namespace Gz\Utools\times\interfaces;
/**
 * 接口解释说明
 */
abstract class TimterInterface
{

    /**
     * 吧y-m-d  搭配时间转换成系统 指定的格式   y=> 'year'
     *
     * @param $number 时间
     * @param $type  y m  d  h  i  s
     * @return $this   ` 1 day` or `1 days`
     */
    public function typeToSystemType($number = 1, $type = 'd')
    {
    }

    /**
     * 获取最终结果
     *
     * @return void
     */
    public function end()
    {
    }


    /**
     * 时间开始
     *
     * @return $this;
     */
    public function startOf($type = 'd')
    {
    }

    /**
     * 时间格式化
     *
     * @param $format  'Y-m-d H:i:s'
     * @return $this
     */
    public function format($format)
    {

    }

    /**
     * 当前时间转成utc
     *
     * @return $this
     *
     */
    public function utc()
    {
    }


    /**
     * 计算两个日期相差 年 月 日
     *
     * DiffDate("2021-01-06","2023-06-16");
     * @param $date1
     * @param $date2
     * @return array
     */
    function diffDate()
    {
    }


    /**
     * 相对当前时间
     *
     * @return void
     */
    public function fromNow()
    {
    }


    /**
     * 相对指定时间（前）
     *
     * @param $time
     * @return mixed
     */
    public function from($time)
    {
    }


    /**
     * 获取当前月份包含的天数。
     *
     * @return $this
     *
     */
    public function daysInMonth()
    {

    }

    /**
     * 时间结束
     *
     * @param $type
     * @return void
     */
    public function endOf($type = 'd')
    {
    }


    /**
     * 时间增加
     *
     * @param $number  增加的具体时间
     * 加的类型 y:年 m:月 d:日 h:时 i:分 s:秒
     * @return self
     */
    public function inc($number = 0, $type = 'd')
    {
    }


    /**
     * 时间减少
     *
     * @param $number  增加的具体时间
     * 加的类型 y:年 m:月 d:日 h:时 i:分 s:秒
     * @return self
     */
    public function dec($number = 0, $type = 'd')
    {
    }


    /**
     * 转unix
     *
     * @return self
     */
    public function unix()
    {
    }


    /**
     * 验证时间
     *
     * @param $format  验证格式
     * @return void
     */
    public function isValid($format = '')
    {

    }


    /**
     * 对象的年份是否是闰年。
     *
     * @return bool
     */
    public function isLeapYear()
    {
    }


    /**
     * 是否在另一个提供的日期时间之前。
     *
     * @param $time
     * @return bool
     */
    public function isBefore($time = '')
    {
    }

    /**
     * 供的日期时间相同
     *
     * @return bool
     */
    public function isSame()
    {
    }

    /**
     * 对象是否在另一个提供的日期时间之后。
     *
     * @return bool
     */
    public function isAfter()
    {
    }
}