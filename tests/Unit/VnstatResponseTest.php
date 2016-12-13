<?php

use Luna\Vnstat\VnstatResponse;
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

        $response = new VnstatResponse(json_encode($testdata));

        $this->assertEquals('{"vnstat_version":"0","interfaces":[]}', (string) $response);
    }

    /**
     * @test
     * @expectedException \Luna\Vnstat\Exceptions\InvalidJsonException
     */
    public function throws_exception_on_invalid_json()
    {
        new VnstatResponse('test');
    }

}