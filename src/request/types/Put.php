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
    public function put($url, $data, $format = 'form_params')
    {
        $this->setUrl($url)
            ->setMethod("PUT");
        switch ($format) {
            case 'json':
                $this->setHeaders(['Content-type' => 'application/json']);
                $this->setJson($data);
                break;
            case 'body':
                $this->setHeaders(['Content-type' => 'multipart/form-data']);
                $this->setBody($data);
                break;
            default:
                $this->setFormParams($data);
                break;
        }
        return $this;

    }


}