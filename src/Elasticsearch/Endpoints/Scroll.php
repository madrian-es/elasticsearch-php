<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints;

use Elasticsearch\Common\Exceptions;

/**
 * Class Scroll
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Scroll extends AbstractEndpoint
{
    /**
     * @return $this
     */
    public function setScrollId(string $scrollId): Scroll
    {
        $this->scrollId = $scrollId;

        return $this;
    }

    public function getURI(): string
    {
        $scrollId = $this->scrollId ?? null;

        if (isset($scrollId)) {
            return "/_search/scroll/$scrollId";
        }

        return "/_search/scroll";
    }

    public function getParamWhitelist(): array
    {
        return [
            'scroll',
            'rest_total_hits_as_int'
        ];
    }

    public function getMethod(): string
    {
        return 'GET';
    }
}
