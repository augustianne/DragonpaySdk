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
 * Lists all possible processors accepted by Dragonpay
 *
 * @author  Yan Barreta
 * @version dated: Sept 13, 2018
 */
class Processor
{
    const BAYAD_CENTER = 'BAYD';
    const BTC = 'BITC';
    const CREDIT_CARD = 'CC';
    const CEBUANA_LHUILLIER = 'CEBL';
    const CHINA_UNIONPAY = 'CUP';
    const DRAGONPAY_PREPAID_CREDITS = 'DPAY';
    const ECPAY = 'ECPY';
    const GCASH = 'GCSH';
    const LBC = 'LBC';
    const PAYPAL = 'PYPL';
    const MLHUILLIER = 'MLH';
    const ROBINSONS_DEPT_STORE = 'RDS';
    const SM_PAYMENT_COUNTERS = 'SMR';
    const BANCNET_ONLINE = 'BOL';
    const SEVEN_ELEVEN = '711';

    private $processorNames = array(
        BAYAD_CENTER => 'Bayad Center',
        BTC => 'Bitcoins',
        CREDIT_CARD => 'Credit Cards',
        CEBUANA_LHUILLIER => 'Cebuana Lhuillier',
        CHINA_UNIONPAY => 'China Unionpay',
        DRAGONPAY_PREPAID_CREDITS => 'Dragonpay Prepaid Credits',
        ECPAY => 'ECPay',
        GCASH => 'Globe GCash',
        LBC => 'LBC',
        PAYPAL => 'PayPal',
        MLHUILLIER => 'M. Lhuillier',
        ROBINSONS_DEPT_STORE => 'Robinsons Dept Store',
        SM_PAYMENT_COUNTERS => 'SM Payment Counters',
        BANCNET_ONLINE => 'Bancnet Online',
        SEVEN_ELEVEN => '7-Eleven'
    );

    public function getProcessorNameById($id)
    {
        $processorNames = $this->getAllProcessors();

        return array_key_exists($id, $processorNames) ? $processorNames[$id] : null;
    }

    public function getAllProcessors()
    {
        return $this->processorNames;
    }
}
