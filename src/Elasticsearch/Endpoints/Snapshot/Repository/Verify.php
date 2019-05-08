<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Snapshot\Repository;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Verify
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Snapshot\Repository
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Verify extends AbstractEndpoint
{
    /**
     * A comma-separated list of repository names
     *
     * @var string
     */
    private $repository;

    public function setRepository(string $repository): Verify
    {
        if (isset($repository) !== true) {
            return $this;
        }

        $this->repository = $repository;

        return $this;
    }

    /**
     * @throws \Elasticsearch\Common\Exceptions\RuntimeException
     */
    public function getURI(): string
    {
        $repository = $this->repository;
        if (isset($this->repository) !== true) {
            throw new Exceptions\RuntimeException(
                'repository is required for Verify'
            );
        }

        $uri   = "/_snapshot/$repository/_verify";

        return $uri;
    }

    public function getParamWhitelist(): array
    {
        return [
            'master_timeout',
            'local',
        ];
    }

    public function getMethod(): string
    {
        return 'POST';
    }
}
