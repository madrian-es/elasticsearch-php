<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Indices;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Recovery
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Indices
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Recovery extends AbstractEndpoint
{
    public function getURI(): string
    {
        $index = $this->index;
        $uri   = "/_recovery";

        if (isset($index) === true) {
            $uri = "/$index/_recovery";
        }

        return $uri;
    }

    public function getParamWhitelist(): array
    {
        return [
            'detailed',
            'active_only',
            'human'
        ];
    }

    public function getMethod(): string
    {
        return 'GET';
    }
}
