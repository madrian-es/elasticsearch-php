<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Indices\Alias;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Exists
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Indices\Alias
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Exists extends AbstractEndpoint
{
    /**
     * A comma-separated list of alias names to return
     *
     * @var string
     */
    private $name;

    public function setName(string $name): Exists
    {
        if (isset($name) !== true) {
            return $this;
        }

        $this->name = $name;

        return $this;
    }

    public function getURI(): string
    {
        $index = $this->index;
        $name = $this->name;
        $uri   = "/_alias/$name";

        if (isset($index) === true && isset($name) === true) {
            $uri = "/$index/_alias/$name";
        } elseif (isset($index) === true) {
            $uri = "/$index/_alias";
        } elseif (isset($name) === true) {
            $uri = "/_alias/$name";
        }

        return $uri;
    }

    public function getParamWhitelist(): array
    {
        return [
            'ignore_unavailable',
            'allow_no_indices',
            'expand_wildcards',
            'local',
        ];
    }

    public function getMethod(): string
    {
        return 'HEAD';
    }
}
