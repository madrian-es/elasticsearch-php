<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints;

use Elasticsearch\Common\Exceptions\RuntimeException;

/**
 * Class Delete
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Delete extends AbstractEndpoint
{
    /**
     * @throws RuntimeException
     */
    public function getURI(): string
    {
        if (isset($this->id) !== true) {
            throw new RuntimeException(
                'id is required for Delete'
            );
        }
        if (isset($this->index) !== true) {
            throw new RuntimeException(
                'index is required for Delete'
            );
        }
        if (isset($this->type) !== true) {
            throw new RuntimeException(
                'type is required for Delete'
            );
        }
        $id = $this->id;
        $index = $this->index;
        $type = $this->type;
        $uri   = "/$index/$type/$id";

        if (isset($index) === true && isset($type) === true && isset($id) === true) {
            $uri = "/$index/$type/$id";
        }

        return $uri;
    }

    public function getParamWhitelist(): array
    {
        return [
            'consistency',
            'parent',
            'refresh',
            'replication',
            'routing',
            'timeout',
            'version',
            'version_type',
            'include_type_name',
            'if_primary_term',
            'if_seq_no'
        ];
    }

    public function getMethod(): string
    {
        return 'DELETE';
    }
}
