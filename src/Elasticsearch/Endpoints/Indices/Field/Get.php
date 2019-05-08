<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Indices\Field;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Get
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Indices\Field
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Get extends AbstractEndpoint
{
    /**
     * A comma-separated list of fields
     *
     * @var string
     */
    private $field;

    public function setField(string $field): Get
    {
        if (isset($field) !== true) {
            return $this;
        }

        $this->field = $field;

        return $this;
    }

    /**
     * @throws \Elasticsearch\Common\Exceptions\RuntimeException
     */
    public function getURI(): string
    {
        if (isset($this->field) !== true) {
            throw new Exceptions\RuntimeException(
                'field is required for Get'
            );
        }
        $index = $this->index;
        $type = $this->type;
        $field = $this->field;
        $uri   = "/_mapping/field/$field";

        if (isset($index) === true && isset($type) === true && isset($field) === true) {
            $uri = "/$index/_mapping/$type/field/$field";
        } elseif (isset($type) === true && isset($field) === true) {
            $uri = "/_mapping/$type/field/$field";
        } elseif (isset($index) === true && isset($field) === true) {
            $uri = "/$index/_mapping/field/$field";
        } elseif (isset($field) === true) {
            $uri = "/_mapping/field/$field";
        }

        return $uri;
    }

    public function getParamWhitelist(): array
    {
        return [
            'include_defaults',
            'ignore_unavailable',
            'allow_no_indices',
            'expand_wildcards',
            'local'
        ];
    }

    public function getMethod(): string
    {
        return 'GET';
    }
}
