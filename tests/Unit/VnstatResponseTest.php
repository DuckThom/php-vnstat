<?php

use \Luna\Vnstat\Vnstat;

/**
 * Class VnstatTest
 *
 * @package     Luna\Vnstat
 * @category    tests
 * @author      Thomas Wiringa <thomas.wiringa@gmail.com>
 */
class VnstatResponseTest extends TestCase
{

    /**
     * @test
     */
    public function returns_json_when_cast_to_string()
    {
        $testdata = new \stdClass();
        $testdata->vnstatversion = '0';
        $testdata->interfaces = [];

        $response = new \Luna\Vnstat\VnstatResponse($testdata);

        $this->assertEquals('{"vnstat_version":"0","interfaces":[]}', (string) $response);
    }
}
