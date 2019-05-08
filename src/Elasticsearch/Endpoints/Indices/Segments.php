<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Indices;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Segments
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Indices
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Segments extends AbstractEndpoint
{
    public function getURI(): string
    {
        $index = $this->index;
        $uri   = "/_segments";

        if (isset($index) === true) {
            $uri = "/$index/_segments";
        }

        return $uri;
    }

    public function getParamWhitelist(): array
    {
        return [
            'ignore_unavailable',
            'allow_no_indices',
            'expand_wildcards',
            'human',
            'operation_threading',
        ];
    }

    public function getMethod(): string
    {
        return 'GET';
    }
}
