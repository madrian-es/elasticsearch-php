<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints;

use Elasticsearch\Common\Exceptions\RuntimeException;
use Elasticsearch\Serializers\SerializerInterface;

/**
 * Class MsearchTemplate
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class MsearchTemplate extends AbstractEndpoint
{
    /**
     * @param SerializerInterface $serializer
     */
    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @param array|string $body
     */
    public function setBody($body): MsearchTemplate
    {
        if (isset($body) !== true) {
            return $this;
        }

        if (is_array($body) === true) {
            $bulkBody = "";
            foreach ($body as $item) {
                $bulkBody .= $this->serializer->serialize($item)."\n";
            }
            $body = $bulkBody;
        }

        $this->body = $body;

        return $this;
    }

    public function getURI(): string
    {
        $index = $this->index;
        $type = $this->type;
        $uri   = "/_msearch/template";

        if (isset($index) === true && isset($type) === true) {
            $uri = "/$index/$type/_msearch/template";
        } elseif (isset($index) === true) {
            $uri = "/$index/_msearch/template";
        } elseif (isset($type) === true) {
            $uri = "/_all/$type/_msearch/template";
        }

        return $uri;
    }

    public function getParamWhitelist(): array
    {
        return [
            'search_type',
            'typed_keys',
            'max_concurrent_searches'
        ];
    }

    /**
     * @throws RuntimeException
     */
    public function getBody(): array
    {
        if (isset($this->body) !== true) {
            throw new RuntimeException('Body is required for MSearch');
        }

        return $this->body;
    }

    public function getMethod(): string
    {
        return 'GET';
    }
}
