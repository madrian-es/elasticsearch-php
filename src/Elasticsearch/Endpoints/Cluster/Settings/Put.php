<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Cluster\Settings;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Put
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Cluster\Settings
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Put extends AbstractEndpoint
{
    public function setBody(?array $body): Put
    {
        if (isset($body) !== true) {
            return $this;
        }

        $this->body = $body;

        return $this;
    }

    public function getURI(): string
    {
        $uri   = "/_cluster/settings";

        return $uri;
    }

    public function getParamWhitelist(): array
    {
        return [
            'flat_settings',
        ];
    }

    public function getMethod(): string
    {
        return 'PUT';
    }
}
