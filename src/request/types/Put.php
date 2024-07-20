<?php

namespace Gz\Utools\request\types;


/**
 *  editor: gz,
 *  motto: 大自然的搬运工
 *  time: 2024-01-19
 */
trait Put
{


    /**
     * @param $url
     * @param $data
     * @param $format 参数格式 ['form_params','json','query','body']
     * @return $this
     */
    public function put($url)
    {
        $this->setUrl($url)
            ->setMethod("PUT");
        return $this;

    }




}