<?php

namespace Uecode\Bundle\ApiKeyBundle\Extractor;

use Symfony\Component\HttpFoundation\Request;

/**
 * Extracts API keys from a request.
 * @author Christian Pohl <pohl@jungehaie.com>
 *
 * Class RequestExtractor
 * @package Uecode\Bundle\ApiKeyBundle\Extractor
 */
class RequestExtractor implements KeyExtractor
{
    /**
     * @var string
     */
    private $parameterName;

    /**
     * @param string $parameterName The name of the URL parameter containing the API key.
     */
    public function __construct($parameterName)
    {
        $this->parameterName = $parameterName;
    }

    /**
     * {@inheritDoc}
     */
    public function hasKey(Request $request)
    {
        return $request->request->has($this->parameterName);
    }

    /**
     * {@inheritDoc}
     */
    public function extractKey(Request $request)
    {
        return $request->request->get($this->parameterName);
    }
}
