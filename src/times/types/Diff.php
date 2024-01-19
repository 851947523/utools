<?php
namespace Gz\Utools\times\types;
/**
 *  计算时间差异
 *  editor: gz,
 *  motto: 大自然的搬运工
 *  time: 2024-01-13
 */
trait Diff
{
    /**
     * 计算两个日期相差 年 月 日
     * DiffDate("2021-01-06","2023-06-16");
     * @param $date1
     * @param $date2
     * @return array
     */
    function diffDate($date1, $date2)
    {
        if (!$this->isValid($date1) || !$this->isValid($date2)) {
            return false;
        }
        $start = new \DateTime($date1);
        $end = new \DateTime($date2);
        // 计算时间差
        $interval = $start->diff($end);
        // 转换为年、月、天、小时和分钟
        $years = $interval->y;
        $months = $interval->m;
        $days = $interval->d;
        $hours = $interval->h;
        $minutes = $interval->i;
        $seconds = $interval->s;
        return ['y' => $years, 'm' => $months, 'd' => $days, 'h' => $hours, 'i' => $minutes, 's' => $seconds];
    }


}