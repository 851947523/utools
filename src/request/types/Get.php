<?php

namespace Gz\Utools\request\types;

use GuzzleHttp\Client;

/**
 *  editor: gz,
 *  motto: 大自然的搬运工
 *  time: 2024-01-19
 */
trait Get
{



    public function get($url, $data)
    {
        return $this->setQuery($data)
            ->setUrl($url)
            ->setMethod("GET")->setQuery($data);
    }



}