<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints;

use Elasticsearch\Common\Exceptions\InvalidArgumentException;
use Elasticsearch\Common\Exceptions;

/**
 * Class FieldCaps
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class FieldCaps extends AbstractEndpoint
{
    public function setBody($body): FieldCaps
    {
        if (isset($body) !== true) {
            return $this;
        }

        $this->body = $body;
        return $this;
    }

    public function getURI(): string
    {
        $index = $this->index;

        if (isset($index) === true) {
            return "/$index/_field_caps";
        } else {
            return "/_field_caps";
        }
    }

    public function getParamWhitelist(): array
    {
        return [
            'fields',
            'ignore_unavailable',
            'allow_no_indices',
            'expand_wildcards'
        ];
    }

    public function getMethod(): string
    {
        return 'GET';
    }
}
