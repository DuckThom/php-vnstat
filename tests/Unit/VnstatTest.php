<?php

use \Luna\Vnstat\Vnstat;

/**
 * Class VnstatTest
 *
 * @package     Luna\Vnstat
 * @category    tests
 * @author      Thomas Wiringa <thomas.wiringa@gmail.com>
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
     * @expectedException \Luna\Vnstat\Exceptions\ExecutableNotFoundException
     */
    public function throws_exception_if_executable_is_not_found()
    {
        $mock = $this->getMockBuilder(Vnstat::class)
            ->setConstructorArgs(['test'])
            ->setMethods(['findVnstat'])
            ->getMock();

        $mock->expects($this->once())
            ->method('findVnstat')
            ->willThrowException(new \Luna\Vnstat\Exceptions\ExecutableNotFoundException);

        $mock->setExecutablePath('foo');
        $mock->run();
    }

    /**
     * @test
     */
    public function returns_correct_response_on_success()
    {
        $this->assertInstanceOf(\Luna\Vnstat\VnstatResponse::class, Vnstat::get('wlp2s0'));
    }
}
