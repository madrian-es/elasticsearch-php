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
    public function setBody(array $body): Put
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
        $index = $this->index ?? null;
        $type = $this->type ?? null;

        if (null === $index && $type === $index) {
            throw new Exceptions\RuntimeException(
                'type or index are required for Put'
            );
        }
        $uri = '';
        if (null !== $index) {
            $uri = "/$index";
        }
        $uri .= '/_mapping';
        if (null !== $type) {
            $uri .= "/$type";
        }

        return $uri;
    }

    public function getParamWhitelist(): array
    {
        return [
            'ignore_conflicts',
            'timeout',
            'master_timeout',
            'ignore_unavailable',
            'allow_no_indices',
            'expand_wildcards',
            'update_all_types',
            'include_type_name'
        ];
    }

    /**
     * @throws \Elasticsearch\Common\Exceptions\RuntimeException
     */
    public function getBody(): array
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
