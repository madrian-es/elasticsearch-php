<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Cluster;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Reroute
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Cluster
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Reroute extends AbstractEndpoint
{
    public function setBody(array $body): Reroute
    {
        if (isset($body) !== true) {
            return $this;
        }

        $this->body = $body;

        return $this;
    }

    public function getURI(): string
    {
        $uri   = "/_cluster/reroute";

        return $uri;
    }

    public function getParamWhitelist(): array
    {
        return [
            'dry_run',
            'filter_metadata',
            'master_timeout',
            'timeout',
            'explain',
            'metric'
        ];
    }

    public function getMethod(): string
    {
        return 'POST';
    }
}
