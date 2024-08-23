<?php

namespace Gz\Utools\request\types;



/**
 *
 *  editor: gz,
 *  motto: 大自然的搬运工
 *  time: 2024-01-20
 */
trait Common
{
    public $json ;
    public $body ;
    public $query ;
    public $cert;

    private $headers = ['Content-type' => 'application/x-www-form-urlencoded'];
    private $method;
    private $url;

    public $formParams;
    public $verify = false;
    public $stream = false;


    public function setHeaders($headers = [])
    {
        $this->headers = array_merge($this->headers, $headers);
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
            $data = [
                'headers' => $this->getHeaders(),
                'form_params' => $this->getFormParams(),
                'json' => $this->getJson(),
                'verify' => $this->getQuery(),
                'body'=>$this->getBody(),
                'query'=>$this->getQuery(),
                'stream' => $this->getStream()
            ];
           ;
            $response = $this->client->request($this->getMethod(), $this->getUrl(), $data);
            $contents = $response->getBody()->getContents();
            $result = json_decode($contents, true);
            return is_array($result) ? $result : $contents;
        } catch (\Exception $e) {
            var_dump($e->getMessage());
            return false;
        }
    }

    public function cleanData()
    {
        $this->setQuery([]);
        $this->setFormParams([]);
        $this->setBody([]);
        $this->setJson([]);
    }


    public function getQuery()
    {
        return $this->query;
    }

    public function setQuery($data)
    {
        $this->query = $data;
        return $this;
    }

    public function getFormParams()
    {
        return $this->formParams;
    }

    public function setFormParams($data)
    {
        $this->formParams = $data;
        return $this;
    }

    public function getJson()
    {
        return $this->json;
    }

    public function setJson($data)
    {
        $this->json = $data;
        return $this;
    }


    public function getBody()
    {
        return $this->body;
    }

    public function setBody($data)
    {
        $this->body = $data;
        return $this;
    }

    public function getCert()
    {
        return $this->cert;
    }

    public function setCert($data)
    {
        $this->cert = $data;
        return $this;
    }


    public function getVerify()
    {
        return $this->verify;
    }

    public function setVerify($data)
    {
        $this->verify = $data;
        return $this;
    }


    public function getStream()
    {
        return $this->stream;
    }

    public function setStream($data)
    {
        $this->stream = $data;
        return $this;
    }

}