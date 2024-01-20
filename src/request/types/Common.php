<?php

namespace Gz\Utools\request\types;

use app\lib\ajax\Ajax;
use app\lib\constMsg\Status;

/**
 *
 *  editor: gz,
 *  motto: 大自然的搬运工
 *  time: 2024-01-20
 */
trait Common
{
    public function setHeaders($headers = [])
    {
        $this->headers = $headers;
        return $this;
    }

    public function getHeaders()
    {
        return $this->headers;
    }


//    /**
//     * 请求数据封装['method,url,param headers 等...]
//     * @param $data
//     * @return $this
//     */
//    public function setData($data)
//    {
//        $this->data = $data;
//        return $this;
//    }
//
//    public function getData()
//    {
//        return $this->data;
//    }

    public function getMethod()
    {
        return $this->method;
    }

    public function setMethod($method = 'get')
    {
        $this->method = $method;
        return $this;
    }


    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }





    /**
     * 发送请求
     * @return $this|false
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function send()
    {
        try {
            $response = $this->client->request($this->getMethod(), $this->getUrl(), [
                'headers' => $this->getHeaders(),
                'query' => $this->getQuery(),
                'form_params'=>$this->getFormParams(),
            ]);
            $contents = $response->getBody()->getContents();
            $result = json_decode($contents, true);
            return is_array($result) ? $result : $contents;
        } catch (\Exception $e) {
            return false;
        }

    }

}