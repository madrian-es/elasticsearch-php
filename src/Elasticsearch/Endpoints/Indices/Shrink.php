<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Indices;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Shrink.
 *
 * @category Elasticsearch
 *
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 *
 * @link     http://elastic.co
 */
class Shrink extends AbstractEndpoint
{
    /**
     * The name of the target index to shrink into
     *
     * @var string
     */
    private $target;

    public function setBody(array $body): Shrink
    {
        if (isset($body) !== true) {
            return $this;
        }

        $this->body = $body;

        return $this;
    }

    public function setTarget(string $target): Shrink
    {
        if (isset($target) !== true) {
            return $this;
        }
        $this->target = $target;

        return $this;
    }

    /**
     * @throws \Elasticsearch\Common\Exceptions\BadMethodCallException
     */
    public function getURI(): string
    {
        if (isset($this->index) !== true) {
            throw new Exceptions\RuntimeException(
                'index is required for Shrink'
            );
        }
        if (isset($this->target) !== true) {
            throw new Exceptions\RuntimeException(
                'target is required for Shrink'
            );
        }
        $index = $this->index;
        $target = $this->target;
        $uri = "/$index/_shrink/$target";
        if (isset($index) === true && isset($target) === true) {
            $uri = "/$index/_shrink/$target";
        }

        return $uri;
    }

    public function getParamWhitelist(): array
    {
        return [
            'timeout',
            'master_timeout',
        ];
    }

    public function getMethod(): string
    {
        return 'PUT';
    }
}
