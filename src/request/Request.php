<?php

namespace Gz\Utools\request;

/**
 * @method setQuery()
 * @method getQuery()
 */
use GuzzleHttp\Client;
use Gz\Utools\Instance\Instance;
use Gz\Utools\request\types\Common;
use Gz\Utools\request\types\Get;
use Gz\Utools\request\types\Post;
use think\Exception;

/**
 *  editor: gz,
 *  motto: 大自然的搬运工
 *  time: 2024-01-19
 */
class Request
{
    use Instance;
    use Get;
    use Post;
    use Common;

    private $client;
    private $headers;
    private $method;
    private $url;


    public function __construct()
    {
        if (empty($this->client)) {
            $baseConfig = !empty($this->getOptions()) ? $this->getOptions() : [
                'base_uri' => '',
                'timeout' => '2.0'
            ];
            $this->client = new Client($baseConfig);
        }
    }

    public function __call($method, $args)
    {
        
    }


}