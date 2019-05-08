<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Indices\Mapping;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Get
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Indices\Mapping
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Get extends AbstractEndpoint
{
    public function getURI(): string
    {
        $index = $this->index;
        $type = $this->type;
        $uri   = "/_mapping";

        if (isset($index) === true && isset($type) === true) {
            $uri = "/$index/_mapping/$type";
        } elseif (isset($type) === true) {
            $uri = "/_mapping/$type";
        } elseif (isset($index) === true) {
            $uri = "/$index/_mapping";
        }

        return $uri;
    }

    public function getParamWhitelist(): array
    {
        return [
            'ignore_unavailable',
            'allow_no_indices',
            'expand_wildcards',
            'wildcard_expansion',
            'local',
            'include_type_name'
        ];
    }

    public function getMethod(): string
    {
        return 'GET';
    }
}
