<?php

/*
 * This file is part of DragonpaySdk.
 *
 * Yan Barreta <augustianne.barreta@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Yan\DragonpaySdk\Api;

use Yan\DragonpaySdk\Constants\Mode;
use Yan\DragonpaySdk\Constants\Processor;
use Yan\DragonpaySdk\Constants\RequestParameter

/**
 * Set transaction parameters
 *
 * @author  Yan Barreta
 * @version dated: Sept 13, 2018
 */
class Transaction
{
	private $requestParameter;
	private $parameters = array();

	private $merchantId;
	private $secretKey;

    public function __construct(RequestParameter $requestParameter)
    {
    	$this->requestParameter = $requestParameter;
    }

    public function setParameters($parameters)
    {
    	$this->parameters = $parameters;
    }

    public function setMerchantId($merchantId)
    {
    	$this->merchantId = $merchantId;
    }

    public function setSecretKey($secretKey)
    {
    	$this->secretKey = $secretKey;
    }

    public function setProcessorId($processorId)
    {
    	$this->processorId = $processorId;
    }

    public function setMode($mode)
    {
    	$this->mode = $mode;
    }

    public function orderParameters($parameters)
    {
        $parameterOrder = $this->requestParameter->getParameterOrder();
        
        $orderedParameters = array();
        foreach ($parameterOrder as $key) {
            if (isset($parameters[$key])) {
                $orderedParameters[$key] = $parameters[$key];
            }
        }

        return $orderedParameters;
    }
}
