<?php

/*
 * This file is part of DragonpaySdk.
 *
 * Yan Barreta <augustianne.barreta@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Yan\DragonpaySdk\Constants;

use Yan\DragonpaySdk\Exception\ParameterMissingException;

/**
 * Lists all possible http parameters accepted by Dragonpay
 *
 * @author  Yan Barreta
 * @version dated: Sept 13, 2018
 */
class RequestParameter
{
    const MERCHANT_ID = 'merchantid';
    const TRANSACTION_ID = 'txnid';
    const AMOUNT = 'amount';
    const CURRENCY = 'ccy';
    const DESCRIPTION = 'description';
    const EMAIL = 'email';
    const DIGEST = 'digest';
    const SECRET_KEY = 'secret_key';
    const PARAM1 = 'param1';
    const PARAM2 = 'param2';
    
    private $requiredParameters = array(
        self::MERCHANT_ID,
        self::TRANSACTION_ID,
        self::AMOUNT,
        self::CURRENCY,
        self::DESCRIPTION,
        self::EMAIL,
        self::SECRET_KEY
    );

    private $parameterOrder = array(
        self::MERCHANT_ID,
        self::TRANSACTION_ID,
        self::AMOUNT,
        self::CURRENCY,
        self::DESCRIPTION,
        self::EMAIL,
        self::SECRET_KEY
    );

    private $parameters;
    
    public function __construct($parameters)
    {
        $this->parameters = $parameters;
    }

    public function getRequiredParameters()
    {
        return $this->requiredParameters;
    }

    public function getParameterOrder()
    {
        return $this->parameterOrder;
    }

    public function getParameters()
    {
        return $this->parameters;
    }

    public function addParameter($param, $value)
    {
        $this->parameters[$param] = $value;
    }

    public function getMerchantId()
    {
        return $this->parameters[RequestParameter::MERCHANT_ID];
    }

    public function getTransactionId()
    {
        return $this->parameters[RequestParameter::TRANSACTION_ID];
    }

    public function getAmount()
    {
        return $this->parameters[RequestParameter::AMOUNT];
    }

    public function getCurrency()
    {
        return $this->parameters[RequestParameter::CURRENCY];
    }

    public function getDescription()
    {
        return $this->parameters[RequestParameter::DESCRIPTION];
    }

    public function getEmail()
    {
        return $this->parameters[RequestParameter::EMAIL];
    }

    public function getSecretKey()
    {
        return $this->parameters[RequestParameter::SECRET_KEY];
    }

    public function validateRequiredParameters()
    {
        $parameters = $this->getParameters();
        $requiredParameters = $this->getRequiredParameters();
        $parameterKeys = array_keys($parameters);

        $diff = array_diff($requiredParameters, $parameterKeys);
        
        if (count($diff)) {
            throw new ParameterNotFoundException(sprintf("Missing parameters: %s", implode(',', $diff)));
        }
    }

    public function orderParameters()
    {
        $parameters = $this->getParameters();
        $parameterOrder = $this->getParameterOrder();
        
        $orderedParameters = array();
        foreach ($parameterOrder as $key) {
            if (isset($parameters[$key])) {
                $orderedParameters[$key] = $parameters[$key];
            }
        }

        $unorderedParameters = array_diff($orderedParameters, $parameters);

        $this->parameters = $orderedParameters + $unorderedParameters;
    }
}
