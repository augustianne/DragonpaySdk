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
    const MODE = 'mode';
    const PROCID = 'procid';

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

    public function getRequiredParameters()
    {
        return $this->requiredParameters;
    }

    public function getParameterOrder()
    {
        return $this->parameterOrder;
    }
}
