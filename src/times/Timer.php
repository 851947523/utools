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
        $this->setValue(time());
        return $value;
    }

}