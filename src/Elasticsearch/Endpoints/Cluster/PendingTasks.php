<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Cluster;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Pendingtasks
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Cluster
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class PendingTasks extends AbstractEndpoint
{
    public function getURI(): string
    {
        $uri   = "/_cluster/pending_tasks";

        return $uri;
    }

    public function getParamWhitelist(): array
    {
        return [
            'local',
            'master_timeout',
        ];
    }

    public function getMethod(): string
    {
        return 'GET';
    }
}
