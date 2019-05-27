<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Indices\Cache;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Clear
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Indices\Cache
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Clear extends AbstractEndpoint
{
    public function getURI(): string
    {
        $index = $this->index;
        $uri   = "/_cache/clear";

        if (isset($index) === true) {
            $uri = "/$index/_cache/clear";
        }

        return $uri;
    }

    public function getParamWhitelist(): array
    {
        return [
            'fielddata',
            'fields',
            'query',
            'filter_keys',
            'id',
            'id_cache',
            'index',
            'recycler',
            'ignore_unavailable',
            'allow_no_indices',
            'expand_wildcards',
            'request'
        ];
    }

    public function getMethod(): string
    {
        return 'POST';
    }
}
