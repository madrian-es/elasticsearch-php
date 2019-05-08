<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints;

use Elasticsearch\Common\Exceptions\RuntimeException;

/**
 * Class Index
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Index extends AbstractEndpoint
{
    /** @var bool  */
    private $createIfAbsent = false;

    public function setBody(array $body): Index
    {
        if (isset($body) !== true) {
            return $this;
        }

        $this->body = $body;

        return $this;
    }

    public function createIfAbsent(): Index
    {
        $this->createIfAbsent = true;

        return $this;
    }

    /**
     * @throws RuntimeException
     */
    public function getURI(): string
    {
        if (isset($this->index) !== true) {
            throw new RuntimeException(
                'index is required for Index'
            );
        }

        if (isset($this->type) !== true) {
            throw new RuntimeException(
                'type is required for Index'
            );
        }

        $id    = $this->id;
        $index = $this->index;
        $type  = $this->type;
        $uri   = "/$index/$type";

        if (isset($id) === true) {
            $uri = "/$index/$type/$id";
        }
        return $uri;
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
            'pipeline',
            'if_primary_term',
            'if_seq_no',
            'include_type_name'
        ];
    }

    public function getMethod(): string
    {
        return isset($this->id) ? 'PUT' : 'POST';
    }

    /**
     * @throws RuntimeException
     */
    public function getBody(): array
    {
        if (isset($this->body) !== true) {
            throw new RuntimeException('Document body must be set for index request');
        } else {
            return $this->body;
        }
    }
}
