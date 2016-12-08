<?php

namespace Luna\Vnstat;

use Symfony\Component\Process\Exception\ProcessFailedException;
use Luna\Vnstat\Exceptions\InvalidJsonException;
use Symfony\Component\Process\ProcessBuilder;
use Luna\Vnstat\Interfaces\VnstatInterface;
use Symfony\Component\Process\Process;

/**
 * Class Vnstat
 *
 * @package Luna\Vnstat
 * @author  Thomas Wiringa <thomas.wiringa@gmail.com>
 */
class Vnstat implements VnstatInterface
{
    const BASE_COMMAND = 'vnstat';

    /**
     * @var string
     */
    protected $response;

    /**
     * @var \stdClass
     */
    protected $json;

    /**
     * @var \Symfony\Component\Process\Process
     */
    protected $process;

    /**
     * @var string
     */
    protected $outputType = 'json';

    /**
     * @var array
     */
    protected $arguments = [];

    /**
     * @var string
     */
    protected $executable;

    /**
     * Constructor.
     *
     * @param  string  $interface
     */
    public function __construct($interface)
    {
        $this->findVnstat();

        // Keep the command line empty for now
        $this->process = new ProcessBuilder;
        $this->process->setPrefix($this->executable);
        $this->process->setArguments(["--query", "--json", "-i", $interface]);
    }

    /**
     * Find the vnstat executable.
     *
     * @return $this
     */
    protected function findVnstat()
    {
        $finder = new Process("which vnstat");

        $finder->run();

        if (!$finder->isSuccessful()) {
            throw new ProcessFailedException($finder);
        }

        $this->setExecutablePath(trim($finder->getOutput()));

        return $this;
    }

    /**
     * Run the query
     *
     * @return \stdClass
     */
    public function run()
    {
        $process = $this->process->getProcess();
        $process->run();

        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        $this->setJson(trim($process->getOutput()));

        return $this->getJson();
    }

    /**
     * Create a new instance
     *
     * @param  string  $interface
     * @return \stdClass
     */
    public static function get($interface)
    {
        $vnstat = new static($interface);

        $vnstat->run();

        return $vnstat->getJson();
    }

    /**
     * @return string
     */
    public function getExecutablePath()
    {
        return $this->executable;
    }

    /**
     * @param  string  $executable
     * @return $this
     */
    public function setExecutablePath($executable)
    {
        $this->executable = $executable;

        return $this;
    }

    /**
     * @return \stdClass
     */
    public function getJson()
    {
        return $this->json;
    }

    /**
     * @param  string  $json
     * @return $this
     * @throws InvalidJsonException
     */
    public function setJson($json)
    {
        $this->json = json_decode($json);

        if ($this->json) {
            return $this;
        } else {
            throw new InvalidJsonException;
        }
    }
}