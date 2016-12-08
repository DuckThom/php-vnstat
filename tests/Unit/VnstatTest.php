<?php

use \Luna\Vnstat\Vnstat;

/**
 * Class VnstatTest
 *
 * @package Luna\Vnstat
 * @author  Thomas Wiringa <thomas.wiringa@gmail.com>
 */
class VnstatTest extends TestCase
{
    /**
     * @test
     */
    public function can_get_and_set_executable_path()
    {
        $vnstat = new Vnstat('test');

        $this->assertInstanceOf(Vnstat::class, $vnstat->setExecutablePath('test/path'));
        $this->assertEquals('test/path', $vnstat->getExecutablePath());
    }

    /**
     * @test
     */
    public function decodes_json_string_when_set()
    {
        $vnstat = new Vnstat('test');

        $this->assertInstanceOf(Vnstat::class, $vnstat->setJson('{"foo":"bar"}'));
        $this->assertEquals('bar', $vnstat->getJson()->foo);
    }

    /**
     * @test
     * @expectedException \Luna\Vnstat\Exceptions\InvalidJsonException
     */
    public function throws_exception_on_invalid_json()
    {
        $vnstat = new Vnstat('test');

        $this->assertInstanceOf(Vnstat::class, $vnstat->setJson(''));
    }
}