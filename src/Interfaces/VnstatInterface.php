<?php

namespace Luna\Vnstat\Interfaces;

use Luna\Vnstat\VnstatResponse;

/**
 * Interface VnstatInterface
 *
 * @package Luna\Vnstat\Interfaces
 * @author  Thomas Wiringa <thomas.wiringa@gmail.com>
 */
interface VnstatInterface
{
    /**
     * VnstatInterface constructor.
     *
     * @param  string  $interface
     */
    public function __construct($interface);

    /**
     * Parse the stored \stdClass to a normalized response
     *
     * @return VnstatResponse
     */
    public function parseJson();

    /**
     * Query the VnStat database.
     *
     * @param  string  $interface
     * @return \stdClass
     */
    public static function get($interface);

    /**
     * Fetch the interface data.
     *
     * @return \stdClass
     */
    public function run();

    /**
     * Get the executable path.
     *
     * @return string
     */
    public function getExecutablePath();

    /**
     * Set the executable path.
     *
     * @param  string  $executable
     * @return mixed
     */
    public function setExecutablePath($executable);

    /**
     * Get the json object.
     *
     * @return \stdClass
     */
    public function getJson();

    /**
     * Set the json object.
     *
     * @param  string  $json
     * @return $this
     */
    public function setJson($json);
}
