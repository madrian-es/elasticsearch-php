<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Tasks;

use Elasticsearch\Common\Exceptions;
use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Cancel
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Tasks
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Cancel extends AbstractEndpoint
{
    private $taskId;

    /**
     * @throws \Elasticsearch\Common\Exceptions\InvalidArgumentException
     */
    public function setTaskId(string $taskId): Cancel
    {
        if (isset($taskId) !== true) {
            return $this;
        }

        $this->taskId = $taskId;

        return $this;
    }

    /**
     * @throws \Elasticsearch\Common\Exceptions\RuntimeException
     */
    public function getURI(): string
    {
        if (isset($this->id) === true) {
            return "/_tasks/{$this->taskId}/_cancel";
        }

        return "/_tasks/_cancel";
    }

    public function getParamWhitelist(): array
    {
        return [
            'node_id',
            'actions',
            'parent_node',
            'parent_task',
        ];
    }

    public function getMethod(): string
    {
        return 'POST';
    }
}
