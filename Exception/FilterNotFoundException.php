<?php

/*
 * This file is part of DragonpaySdk.
 *
 * Yan Barreta <augustianne.barreta@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Yan\DragonpaySdk\Exception;

use \Exception;

/**
 * Lists all possible http parameters accepted by Dragonpay
 *
 * @author  Yan Barreta
 * @version dated: Sept 13, 2018
 */
class FilterNotFoundException extends Exception
{

    public function __construct($message="Filter missing.")
    {
        parent::__construct($message);
    }
}
