<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Indices\Settings;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Get
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Indices\Settings
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Get extends AbstractEndpoint
{
    /**
     * The name of the settings that should be included
     *
     * @var string
     */
    private $name;

    public function setName(string $name): Get
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
        $uri   = "/_settings";

        if (isset($index) === true && isset($name) === true) {
            $uri = "/$index/_settings/$name";
        } elseif (isset($name) === true) {
            $uri = "/_settings/$name";
        } elseif (isset($index) === true) {
            $uri = "/$index/_settings";
        }

        return $uri;
    }

    public function getParamWhitelist(): array
    {
        return [
            'ignore_unavailable',
            'allow_no_indices',
            'expand_wildcards',
            'flat_settings',
            'local',
            'include_defaults'
        ];
    }

    public function getMethod(): string
    {
        return 'GET';
    }
}
