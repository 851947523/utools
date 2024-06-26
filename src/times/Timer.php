<?php

namespace Gz\Utools\times;


use Gz\Utools\Instance\Instance;
use Gz\Utools\times\types\Common;
use Gz\Utools\times\types\Diff;
use Gz\Utools\times\types\Query;
use Gz\Utools\times\types\Update;
use Gz\Utools\times\types\Validate;

/**
 *  editor: gz,
 *  motto: 大自然的搬运工
 * @method diffDate()   计算连个时间的差值年月日
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