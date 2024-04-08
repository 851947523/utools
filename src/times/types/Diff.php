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
    function diffDate($date1)
    {
        $date2 = $this->format()->getValue();
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

    private function getTimeDiffMsg($startTime,$endTime,$result){
        $str = '';
        if ($result['y'] > 0)$str.= $result['y'].'年';
        if ($result['m'] > 0)$str.= $result['m'].'月';
        if ($result['d'] > 0)$str.= $result['d'].'日';
        if ($result['h'] > 0)$str.= $result['h'].'时';
        if ($result['i'] > 0)$str.= $result['i'].'分';
        if ($result['s'] > 0)$str.= $result['s'].'秒';
        if (!empty($str)) {
            $str.= $startTime >= $endTime ? '后' : '前';
        }else {
            $str = '0';
        }
        return $str;
    }

    //相对当前时间
    public function fromNow()
    {
       $startTime = $this->format()->getValue();
       $endTime = date('Y-m-d H:i:s');
       $result = $this->diffDate($endTime);
       $str = $this->getTimeDiffMsg($startTime,$endTime,$result);
       return $str;

    }

    //相对指定时间（前）
    public function from($time)
    {
        $startTime = $this->unix()->format()->getValue();

        $endTime = is_string($time) ? $time : date('Y-m-d H:i:s',$time);

        $result = $this->diffDate($endTime);
        $str = $this->getTimeDiffMsg($startTime,$endTime,$result);
        return $str;

    }
    //日历时间
    public function calendar()
    {

    }
}