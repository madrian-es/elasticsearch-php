<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints;

use Elasticsearch\Common\Exceptions\RuntimeException;

/**
 * Class Mget
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Mget extends AbstractEndpoint
{
    public function setBody(?array $body): Mget
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
        $uri   = "/_mget";

        if (isset($index) === true && isset($type) === true) {
            $uri = "/$index/$type/_mget";
        } elseif (isset($index) === true) {
            $uri = "/$index/_mget";
        } elseif (isset($type) === true) {
            $uri = "/_all/$type/_mget";
        }

        return $uri;
    }

    public function getParamWhitelist(): array
    {
        return [
            'fields',
            'preference',
            'realtime',
            'refresh',
            '_source',
            '_source_include',
            '_source_includes',
            '_source_exclude',
            '_source_excludes',
            'routing',
            'stored_fields'
        ];
    }

    /**
     * @throws RuntimeException
     */
    public function getBody(): array
    {
        if (isset($this->body) !== true) {
            throw new RuntimeException('Body is required for MGet');
        }

        return $this->body;
    }

    public function getMethod(): string
    {
        return 'POST';
    }
}
