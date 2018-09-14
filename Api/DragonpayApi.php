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

use Yan\DragonpaySdk\Api\Transaction;
use Yan\DragonpaySdk\Constants\Filter;
use Yan\DragonpaySdk\Constants\RequestParameter;

/**
 * Access dragonpay api
 *
 * @author  Yan Barreta
 * @version dated: Sept 13, 2018
 */
class DragonpayApi
{
    const MODE_PRODUCTION = 1;
    const MODE_SANDBOX = 2;

    const SANDOXED_URL = 'http://test.dragonpay.ph/Pay.aspx';
    const PRODUCTION_URL = 'https://gw.dragonpay.ph/Pay.aspx';
    
    protected $mode;

    public function __construct($merchantId, $secretKey, $mode=DragonpayApi::MODE_SANDBOX)
    {
        $this->merchantId = $merchantId;
        $this->secretKey = $secretKey;
        $this->mode = $mode;
    }

    public function isSandboxed()
    {
        return $this->mode == DragonpayApi::MODE_SANDBOX;
    }

    public function getCheckoutUrl()
    {
        return $this->isSandboxed() ? DragonpayApi::SANDOXED_URL : DragonpayApi::PRODUCTION_URL;
    }

    public function checkout(Transaction $transaction, Filter $filter=null)
    {
        $transaction->setMerchantId($this->merchantId);
        $transaction->setSecretKey($this->secretKey);

        $url = sprintf(
            "%s?%s&%s", 
            $this->getCheckoutUrl(), 
            http_build_query($transaction->getParameters()),
            $filter ? http_build_query($filter->getFilters()) : ''
        );

        header('Location: '.$url);
        exit;
    }
}
