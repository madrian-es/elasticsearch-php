<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Cluster;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Stats
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Cluster
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Stats extends AbstractEndpoint
{
    /**
     * A comma-separated list of node IDs or names to limit the returned information;
     * use `_local` to return information from the node you're connecting to,
     * leave empty to get information from all nodes
     *
     * @var string
     */
    private $nodeID;

    public function setNodeID(string $node_id): Stats
    {
        if (isset($node_id) !== true) {
            return $this;
        }

        $this->nodeID = $node_id;

        return $this;
    }

    public function getURI(): string
    {
        $node_id = $this->nodeID;
        $uri   = "/_cluster/stats";

        if (isset($node_id) === true) {
            $uri = "/_cluster/stats/nodes/$node_id";
        }

        return $uri;
    }

    public function getParamWhitelist(): array
    {
        return [
            'flat_settings',
            'human',
        ];
    }

    public function getMethod(): string
    {
        return 'GET';
    }
}
