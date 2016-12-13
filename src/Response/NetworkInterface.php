<?php

namespace Luna\Vnstat\Response;

use Carbon\Carbon;
use Luna\Vnstat\Traits\ToJson;

/**
 * Class NetworkInterface
 *
 * @package     Luna\Vnstat
 * @subpackage  Response
 * @author      Thomas Wiringa <thomas.wiringa@gmail.com>
 */
class NetworkInterface
{
    use ToJson;

    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var Carbon
     */
    public $created_at;

    /**
     * @var Carbon
     */
    public $updated_at;

    /**
     * @var \Luna\Vnstat\Response\Traffic
     */
    public $traffic;

    /**
     * NetworkInterface constructor.
     *
     * @param  \stdClass  $interface
     */
    public function __construct($interface)
    {
        $this->id = $interface->id;
        $this->nick = $interface->nick;
        $this->traffic = new InterfaceTraffic($interface->traffic);
    }
}
