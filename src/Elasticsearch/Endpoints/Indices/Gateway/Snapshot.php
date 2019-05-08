<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Indices\Gateway;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Snapshot
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Indices\Gateway
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Snapshot extends AbstractEndpoint
{
    public function getURI(): string
    {
        $index = $this->index;
        $uri   = "/_gateway/snapshot";

        if (isset($index) === true) {
            $uri = "/$index/_gateway/snapshot";
        }

        return $uri;
    }

    public function getParamWhitelist(): array
    {
        return [
            'ignore_unavailable',
            'allow_no_indices',
            'expand_wildcards'
        ];
    }

    public function getMethod(): string
    {
        return 'POST';
    }
}
