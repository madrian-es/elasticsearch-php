<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Cat;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class ThreadPool
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Cat
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */

class ThreadPool extends AbstractEndpoint
{
    public function getURI(): string
    {
        $uri   = "/_cat/thread_pool";

        return $uri;
    }

    public function getParamWhitelist(): array
    {
        return [
            'local',
            'master_timeout',
            'h',
            'help',
            'v',
            'full_id',
            'size',
            'thread_pool_patterns',
            's',
            'format',
        ];
    }

    public function getMethod(): string
    {
        return 'GET';
    }
}
