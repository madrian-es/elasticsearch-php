<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Indices\Validate;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Query
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Indices\Validate
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Query extends AbstractEndpoint
{
    /**
     * @throws \Elasticsearch\Common\Exceptions\InvalidArgumentException
     */
    public function setBody($body): Query
    {
        if (isset($body) !== true) {
            return $this;
        }

        $this->body = $body;

        return $this;
    }

    public function getURI(): string
    {
        return $this->getOptionalURI('_validate/query');
    }

    public function getParamWhitelist(): array
    {
        return [
            'explain',
            'ignore_indices',
            'operation_threading',
            'source',
            'q',
            'df',
            'default_operator',
            'analyzer',
            'analyze_wildcard',
            'lenient',
            'lowercase_expanded_terms'
        ];
    }

    public function getMethod(): string
    {
        return 'GET';
    }
}
