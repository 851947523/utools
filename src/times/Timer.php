<?php

namespace Gz\Utools\times;


use Gz\Utools\Instance\Instance;
use Gz\Utools\times\interface\TimterInterface;
use Gz\Utools\times\types\Common;
use Gz\Utools\times\types\Diff;
use Gz\Utools\times\types\Query;
use Gz\Utools\times\types\Update;
use Gz\Utools\times\types\Validate;

/**
 *  editor: gz,
 *  motto: 大自然的搬运工
 *
 *  @method diffDate()   计算连个时间的差值年月日
 *  time: 2024-01-13
 */
class Timer
{

    use Instance;
    use Common;
    use Update;
    use Diff;
    use Query;
    use Validate;

    private $value;


    /**
     * @param $options
     * @param $cache
     * @return TimterInterface
     * @throws \Exception
     */
    public static function instance($options = "",$cache = false)
    {
        $classFullName = self::getClassName();
        if (!$cache) {
            //清楚缓存
            if (isset(self::$instance[$classFullName])) {
                unset(self::$instance[$classFullName]);
            }
        }
        self::$options = $options;
        if (!isset(self::$instance[$classFullName]) && empty(self::$instance[$classFullName])) {
            if (!class_exists($classFullName, false)) {
                throw new \Exception('"' . $classFullName . '" was not found !');
            }
            $instance = self::$instance[$classFullName] = new static();
            return $instance;
        }
        return self::$instance[$classFullName];
    }

    public function __construct()
    {
        $options = $this->getOptions();
        $this->setValue($options);
    }

    //结尾
    public function end()
    {
        $value = $this->getValue();
        if ($this->format && is_numeric($value)) {
            $value = $this->format($this->format)->getValue();
        }else if (empty($this->format) && !is_numeric($value)) {
            $value = $this->unix()->getValue();
        }
        $this->format = '';
        $this->setValue('');
        return $value;
    }

}