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

use Yan\DragonpaySdk\Exception\FilterNotFoundException;

/**
 * Lists all possible http parameters accepted by Dragonpay
 *
 * @author  Yan Barreta
 * @version dated: Sept 13, 2018
 */
class Filter
{
    const PROCESSOR_ID = 'procid';
    const MODE = 'mode';

    private $filters;
    private $supportedFilters = array(
        self::PROCESSOR_ID,
        self::MODE
    );
    
    public function __construct($filters)
    {
        $this->setFilters($filters);
    }

    public function setFilters($filters)
    {
        $this->filters = $filters;
    }

    public function getFilters()
    {
        return $this->filters;
    }

    public function getSupportedFilters()
    {
        return $this->supportedFilters;
    }

    public function addFilter($filter, $value)
    {
        $supportedFilters = $this->getSupportedFilters();
        if (!in_array($filter, $supportedFilters)) {
            throw new FilterNotFoundException(sprintf("'%s' not a supported filter."));
        }

        $this->filters[$filter] = $value;
    }
}
