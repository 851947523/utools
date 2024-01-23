<?php

namespace Gz\Utools\request\types;

use app\lib\ajax\Ajax;
use app\lib\constMsg\Status;

/**
 *  editor: gz,
 *  motto: 大自然的搬运工
 *  time: 2024-01-19
 */
trait Post
{
    private $form;

    public function post($url, $data, $format = 'form_params')
    {
        $obj = $this->setUrl($url)
            ->setMethod("POST");
        $headers = $obj->getHeaders();
        $obj->setHeaders(array_merge(['Content-type' => 'application/x-www-form-urlencoded'], $headers));
        switch ($format) {
            case 'json':
                $result = $obj->setJson($data);
                break;
            default:
                $result = $obj->setFormParams($data);
                break;
        }
        return $this;

    }


    public function getFormParams()
    {
        return $this->FormParams;
    }

    public function setFormParams($data)
    {
        $this->FormParams = $data;
        return $this;
    }

    public function getJson()
    {
        return $this->json;
    }

    public function setJson($data)
    {
        $this->json = json_encode($data, JSON_UNESCAPED_UNICODE);
        return $this;
    }

}