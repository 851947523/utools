<?php

namespace Gz\Utools\request\types;


/**
 *  editor: gz,
 *  motto: 大自然的搬运工
 *  time: 2024-01-19
 */
trait Post
{

    /**
     * @param $url
     * @param $data
     * @param $format 参数格式 ['form_params','json','query','body']
     * @return $this
     */
    public function post($url)
    {
        $this->setUrl($url)->setMethod("POST");
        return $this;
    }





}