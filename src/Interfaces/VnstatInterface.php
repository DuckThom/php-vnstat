<?php

namespace Luna\Vnstat\Interfaces;

/**
 * Interface VnstatInterface
 *
 * @package Luna\Vnstat\Interfaces
 * @author  Thomas Wiringa <thomas.wiringa@gmail.com>
 */
interface VnstatInterface
{
    /**
     * Query the VnStat database.
     *
     * @param  string  interface
     * @return \stdClass
     */
    public static function get($interface);

    /**
     * @return \stdClass
     */
    public function run();

    /**
     * @return string
     */
    public function getExecutablePath();

    /**
     * @param  string  $executable
     * @return mixed
     */
    public function setExecutablePath($executable);

    /**
     * @return \stdClass
     */
    public function getJson();

    /**
     * @param  string  $json
     * @return $this
     */
    public function setJson($json);
}