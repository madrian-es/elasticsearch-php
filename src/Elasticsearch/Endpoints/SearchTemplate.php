<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints;

use Elasticsearch\Common\Exceptions\InvalidArgumentException;
use Elasticsearch\Common\Exceptions;

/**
 * Class SearchTemplate
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class SearchTemplate extends AbstractEndpoint
{
    /**
     * @return $this
     */
    public function setBody(array $body)
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
        $type = $this->type;
        $uri   = "/_search/template";

        if (isset($index) === true && isset($type) === true) {
            $uri = "/$index/$type/_search/template";
        } elseif (isset($index) === true) {
            $uri = "/$index/_search/template";
        } elseif (isset($type) === true) {
            $uri = "/_all/$type/_search/template";
        }

        return $uri;
    }

    public function getParamWhitelist(): array
    {
        return [
            'ignore_unavailable',
            'allow_no_indices',
            'expand_wildcards',
            'preference',
            'routing',
            'scroll',
            'search_type'
        ];
    }

    public function getMethod(): string
    {
        return 'GET';
    }
}
