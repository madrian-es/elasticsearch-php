<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints;

use Elasticsearch\Common\Exceptions\RuntimeException;

/**
 * Class Explain
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Explain extends AbstractEndpoint
{
    public function setBody(?array $body): Explain
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
                'id is required for Explain'
            );
        }
        if (isset($this->index) !== true) {
            throw new RuntimeException(
                'index is required for Explain'
            );
        }
        if (isset($this->type) !== true) {
            throw new RuntimeException(
                'type is required for Explain'
            );
        }
        $id = $this->id;
        $index = $this->index;
        $type = $this->type;
        $uri   = "/$index/$type/$id/_explain";

        if (isset($index) === true && isset($type) === true && isset($id) === true) {
            $uri = "/$index/$type/$id/_explain";
        }

        return $uri;
    }

    public function getParamWhitelist(): array
    {
        return [
            'analyze_wildcard',
            'analyzer',
            'default_operator',
            'df',
            'fields',
            'lenient',
            'lowercase_expanded_terms',
            'parent',
            'preference',
            'q',
            'routing',
            'source',
            '_source',
            '_source_include',
            '_source_includes',
            '_source_exclude',
            '_source_excludes',
            'stored_fields'
        ];
    }

    public function getMethod(): string
    {
        return 'GET';
    }
}
