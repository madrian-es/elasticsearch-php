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

    public function setBody($body): Index
    {
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

        $id    = $this->id;
        $index = $this->index;
        $type  = $this->type ?? '_doc';
        $uri   = "/$index/$type";

        if (isset($id) === true) {
            $uri = "/$index/$type/$id";
        }
        return $uri;
    }

    public function getParamWhitelist(): array
    {
        return [
            'wait_for_active_shards',
            'op_type',
            'parent',
            'refresh',
            'routing',
            'timeout',
            'version',
            'if_seq_no',
            'if_primary_term',
            'pipeline',
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
    public function getBody()
    {
        if (isset($this->body) !== true) {
            throw new RuntimeException('Document body must be set for index request');
        } else {
            return $this->body;
        }
    }
}
