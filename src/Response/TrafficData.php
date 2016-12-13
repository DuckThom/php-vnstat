<?php

namespace Luna\Vnstat\Response;

use Luna\Vnstat\Traits\ToJson;

/**
 * Class TrafficData
 *
 * @package     Luna\Vnstat
 * @subpackage  Response
 * @author      Thomas Wiringa <thomas.wiringa@gmail.com>
 */
class TrafficData
{
    use ToJson;

    /**
     * @var integer
     */
    public $uploaded;

    /**
     * @var integer
     */
    public $downloaded;

    /**
     * TrafficData constructor.
     *
     * @param  integer  $tx  Transmitted (uploaded) packages
     * @param  integer  $rx  Received (downloaded) packages
     */
    public function __construct($tx, $rx)
    {
        $this->uploaded = $tx;
        $this->downloaded = $rx;
    }
}
