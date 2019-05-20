<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Indices;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Analyze
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Indices
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Analyze extends AbstractEndpoint
{
    public function setBody(?array $body): Analyze
    {
        if (isset($body) !== true) {
            return $this;
        }

        $this->body = $body;

        return $this;
    }

    public function getURI(): string
    {
        $index = $this->index;
        $uri   = "/_analyze";

        if (isset($index) === true) {
            $uri = "/$index/_analyze";
        }

        return $uri;
    }

    public function getParamWhitelist(): array
    {
        return [
            'analyzer',
            'field',
            'filter',
            'index',
            'prefer_local',
            'text',
            'tokenizer',
            'format',
            'char_filter',
            'explain',
            'attributes',
            'format'
        ];
    }

    public function getMethod(): string
    {
        return 'GET';
    }
}
