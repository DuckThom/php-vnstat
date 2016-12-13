<?php

namespace Luna\Vnstat\Response;

use Luna\Vnstat\Traits\ToJson;

/**
 * Class Traffic
 *
 * @package     Luna\Vnstat
 * @subpackage  Response
 * @author      Thomas Wiringa <thomas.wiringa@gmail.com>
 */
class Traffic
{
    use ToJson;

    /**
     * @var TrafficTotal
     */
    public $total;

    /**
     * @var array
     */
    public $days;

    /**
     * @var array
     */
    public $months;

    /**
     * @var array
     */
    public $tops;

    /**
     * @var array
     */
    public $hours;
}