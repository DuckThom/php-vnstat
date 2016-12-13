<?php

namespace Luna\Vnstat\Traits;

/**
 * Json encode when cast to a string.
 *
 * @package     Luna\Vnstat
 * @subpackage  Traits
 * @author      Thomas Wiringa <thomas.wiringa@gmail.com>
 */
trait ToJson
{
    /**
     * Convert the object to a json string
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode($this);
    }
}