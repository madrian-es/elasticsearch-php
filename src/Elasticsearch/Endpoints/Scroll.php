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
    public function setBody(array $body): Scroll
    {
        if (isset($body) !== true) {
            return $this;
        }

        $this->body = $body;

        return $this;
    }

    public function getBody(): array
    {
        return $this->body;
    }

    /**
     * @return $this
     */
    public function setScroll(string $scroll): Scroll
    {
        if (isset($scroll) !== true) {
            return $this;
        }

        $this->body['scroll'] = $scroll;

        return $this;
    }

    /**
     * @return $this
     */
    public function setScrollId(string $scroll_id): Scroll
    {
        if (isset($scroll_id) !== true) {
            return $this;
        }

        $this->body['scroll_id'] = $scroll_id;

        return $this;
    }

    public function getURI(): string
    {
        $uri   = "/_search/scroll";
        return $uri;
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
