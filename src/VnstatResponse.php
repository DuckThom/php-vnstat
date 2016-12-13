<?php

namespace Luna\Vnstat;

use Luna\Vnstat\Response\NetworkInterface;
use Luna\Vnstat\Traits\ToJson;

/**
 * Class VnstatResponse
 *
 * @package Luna\Vnstat
 * @author  Thomas Wiringa <thomas.wiringa@gmail.com>
 */
class VnstatResponse
{
    use ToJson;

    /**
     * @var string
     */
    public $vnstat_version;

    /**
     * @var array
     */
    public $interfaces;

    /**
     * Response constructor.
     *
     * @param \stdClass $json
     */
    public function __construct(\stdClass $json)
    {
        $this->setVnstatVersion($json->vnstatversion);

        $this->setInterfaces($json->interfaces);
    }

    /**
     * Set the response vnstat version.
     *
     * @param  string  $version
     * @return $this
     */
    public function setVnstatVersion($version)
    {
        $this->vnstat_version = $version;

        return $this;
    }

    /**
     * Get the response vnstat version.
     *
     * @return string
     */
    public function getVnstatVersion()
    {
        return $this->vnstat_version;
    }

    /**
     * Parse the interface data.
     *
     * @param  array  $interfaces
     * @return $this
     */
    public function setInterfaces(array $interfaces)
    {
        $this->interfaces = [];

        foreach ($interfaces as $interface) {
            $this->interfaces[] = new NetworkInterface($interface);
        }

        return $this;
    }

    /**
     * Get the interfaces and data.
     *
     * @return array
     */
    public function getInterfaces()
    {
        return $this->interfaces;
    }
}
