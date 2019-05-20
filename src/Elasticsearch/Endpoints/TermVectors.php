<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints;

use Elasticsearch\Common\Exceptions\RuntimeException;

/**
 * Class TermVectors
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class TermVectors extends AbstractEndpoint
{
    public function setBody(?array $body): TermVectors
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
        if (isset($this->index) !== true) {
            throw new RuntimeException(
                'index is required for TermVectors'
            );
        }
        if (isset($this->type) !== true) {
            throw new RuntimeException(
                'type is required for TermVectors'
            );
        }
        if (isset($this->id) !== true && isset($this->body['doc']) !== true) {
            throw new RuntimeException(
                'id or doc is required for TermVectors'
            );
        }

        $index = $this->index;
        $type  = $this->type;
        $id    = $this->id;
        $uri   = "/$index/$type/_termvectors";

        if ($id !== null) {
            $uri = "/$index/$type/$id/_termvectors";
        }

        return $uri;
    }

    public function getParamWhitelist(): array
    {
        return [
            'term_statistics',
            'field_statistics',
            'fields',
            'offsets',
            'positions',
            'payloads',
            'preference',
            'routing',
            'parent',
            'realtime'
        ];
    }

    public function getMethod(): string
    {
        return 'POST';
    }
}
