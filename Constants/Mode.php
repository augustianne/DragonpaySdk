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
 * Lists all possible modes accepted by Dragonpay
 *
 * @author  Yan Barreta
 * @version dated: Sept 13, 2018
 */
class Mode
{
    const ONLINE_BANKING = 1;
    const OTC_BANK = 2;
    const OTC_NON_BANK = 4;
    const EWALLET = 8;
    const RESERVED = 16;
    const PAYPAL = 32;
    const CREDIT_CARDS = 64;
    const MOBILE = 128;
    const INTL_OTC = 256;
    const BANCNET = 512;
    const AUTO_DEBIT = 1024;
    const COD = 2048;

    private $modeNames = array(
        ONLINE_BANKING => 'Online Banking',
        OTC_BANK => 'Over the Counter (Banking and ATM)',
        OTC_NON_BANK => 'Over the Counter (Non-Bank)',
        EWALLET => 'E-Wallets',
        RESERVED => 'Reservec Internally',
        PAYPAL => 'Paypal',
        CREDIT_CARDS => 'Credit Cards',
        MOBILE => 'Mobile',
        INTL_OTC => 'International OTC',
        BANCNET => 'Bancnet',
        AUTO_DEBIT => 'Auto Debit Arrangement',
        COD => 'Cash on Delivery',
    );

    public function getModeNameById($id)
    {
        $modeNames = $this->getAllModes();

        return array_key_exists($id, $modeNames) ? $modeNames[$id] : null;
    }

    public function getAllModes()
    {
        return $this->modeNames;
    }
}
