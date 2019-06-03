<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Indices\Mapping;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Put
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Indices\Mapping
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Put extends AbstractEndpoint
{
    /**
     * @throws \Elasticsearch\Common\Exceptions\InvalidArgumentException
     */
    public function setBody($body): Put
    {
        if (isset($body) !== true) {
            return $this;
        }

        $this->body = $body;

        return $this;
    }

    /**
     * @throws \Elasticsearch\Common\Exceptions\RuntimeException
     */
    public function getURI(): string
    {
        if (isset($this->index) !== true) {
            throw new Exceptions\RuntimeException(
                'index is required for Exists'
            );
        }

        return "/{$this->index}/_mapping";
    }

    public function getParamWhitelist(): array
    {
        return [
            'include_type_name',
            'timeout',
            'master_timeout',
            'ignore_unavailable',
            'allow_no_indices',
            'expand_wildcards'
        ];
    }

    /**
     * @throws \Elasticsearch\Common\Exceptions\RuntimeException
     */
    public function getBody()
    {
        if (isset($this->body) !== true) {
            throw new Exceptions\RuntimeException('Body is required for Put Mapping');
        }

        return $this->body;
    }

    public function getMethod(): string
    {
        return 'PUT';
    }
}
