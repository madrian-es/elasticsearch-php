<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints;

use Elasticsearch\Common\Exceptions\RuntimeException;

/**
 * Class Create
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Create extends AbstractEndpoint
{
    public function setBody(array $body): Create
    {
        if (isset($body) !== true) {
            return $this;
        }

        $this->body = $body;

        return $this;
    }

    /**
     * @throws RuntimeException
     * @return string
     */
    public function getURI(): string
    {
        if (isset($this->index) !== true) {
            throw new RuntimeException(
                'index is required for Create'
            );
        }

        if (isset($this->type) !== true) {
            throw new RuntimeException(
                'type is required for Create'
            );
        }

        if (isset($this->id) !== true) {
            throw new RuntimeException(
                'id is required for Create'
            );
        }

        $id    = $this->id;
        $index = $this->index;
        $type  = $this->type;
        return "/$index/$type/$id/_create";
    }

    public function getParamWhitelist(): array
    {
        return [
            'consistency',
            'op_type',
            'parent',
            'percolate',
            'refresh',
            'replication',
            'routing',
            'timeout',
            'timestamp',
            'ttl',
            'version',
            'version_type',
            'pipeline'
        ];
    }

    public function getMethod(): string
    {
        return 'PUT';
    }

    /**
     * @throws RuntimeException
     */
    public function getBody(): array
    {
        if (isset($this->body) !== true) {
            throw new RuntimeException('Document body must be set for create request');
        } else {
            return $this->body;
        }
    }
}
