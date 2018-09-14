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
use Yan\DragonpaySdk\Constants\RequestParameter;
use Yan\DragonpaySdk\Exception\ParameterNotFoundException;

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

    public function setMerchantId($merchantId)
    {
        $this->merchantId = $merchantId;
    }

    public function setSecretKey($secretKey)
    {
        $this->secretKey = $secretKey;
    }

    public function getParameters()
    {
        try {
            $this->requestParameter->addParameter(RequestParameter::MERCHANT_ID, $this->merchantId);
            $this->requestParameter->addParameter(RequestParameter::SECRET_KEY, $this->secretKey);

            $this->requestParameter->validateRequiredParameters();

            $parameters = $this->requestParameter->getParameters();
            $parameters[RequestParameter::DIGEST] = $this->getDigest();
            
            return $parameters;
        } catch (ParameterNotFoundException $e) {
            throw $e;
        }
    }

    public function getDigest()
    {
        try {
            $this->requestParameter->validateRequiredParameters();

            $this->requestParameter->orderParameters();
            $digest = sha1(sprintf(
                "%s:%s:%s:%s:%s:%s:%s", 
                $this->requestParameter->getMerchantId(),
                $this->requestParameter->getTransactionId(),
                $this->requestParameter->getAmount(),
                $this->requestParameter->getCurrency(),
                $this->requestParameter->getDescription(),
                $this->requestParameter->getEmail(),
                $this->requestParameter->getSecretKey()
            ));

            return $digest;
        } catch (ParameterNotFoundException $e) {
            throw $e;
        }
    }
}
