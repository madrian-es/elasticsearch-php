<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Indices;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Flush
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Indices
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Flush extends AbstractEndpoint
{
    protected $synced = false;

    public function setSynced($synced): void
    {
        $this->synced = $synced;
    }

    public function getURI(): string
    {
        $index = $this->index;
        $uri   = "/_flush";

        if (isset($index) === true) {
            $uri = "/$index/_flush";
        }

        if ($this->synced === true) {
            $uri .= "/synced";
        }

        return $uri;
    }

    public function getParamWhitelist(): array
    {
        return [
            'force',
            'full',
            'ignore_unavailable',
            'allow_no_indices',
            'expand_wildcards',
            'wait_if_ongoing'
        ];
    }

    public function getMethod(): string
    {
        return 'GET';
    }
}
