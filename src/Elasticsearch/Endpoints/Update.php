<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints;

use Elasticsearch\Common\Exceptions\RuntimeException;

/**
 * Class Update
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Update extends AbstractEndpoint
{
    public function setBody(?array $body): Update
    {
        if (isset($body) !== true) {
            return $this;
        }

        $this->body = $body;

        return $this;
    }

    /**
     * @throws RuntimeException
     */
    public function getURI(): string
    {
        if (isset($this->id) !== true) {
            throw new RuntimeException(
                'id is required for Update'
            );
        }
        if (isset($this->index) !== true) {
            throw new RuntimeException(
                'index is required for Update'
            );
        }
        if (isset($this->type) !== true) {
            throw new RuntimeException(
                'type is required for Update'
            );
        }
        $id = $this->id;
        $index = $this->index;
        $type = $this->type;
        $uri   = "/$index/$type/$id/_update";

        if (isset($index) === true && isset($type) === true && isset($id) === true) {
            $uri = "/$index/$type/$id/_update";
        }

        return $uri;
    }

    public function getParamWhitelist(): array
    {
        return [
            'consistency',
            'fields',
            'lang',
            'parent',
            'refresh',
            'replication',
            'retry_on_conflict',
            'routing',
            'script',
            'timeout',
            'timestamp',
            'ttl',
            'version',
            'version_type',
            '_source',
            'include_type_name',
            'if_primary_term',
            'if_seq_no'
        ];
    }

    public function getMethod(): string
    {
        return 'POST';
    }
}
