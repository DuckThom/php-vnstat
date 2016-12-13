<?php

namespace Luna\Vnstat;

use Symfony\Component\Process\Exception\ProcessFailedException;
use Luna\Vnstat\Exceptions\ExecutableNotFoundException;
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
    protected $executable;

    /**
     * Constructor.
     *
     * @param  string|array  $interface
     */
    public function __construct($interface = null)
    {
        if (is_array($interface)) {
            $interface = implode('+', $interface);
        }

        if ($interface === null) {
            $arguments = ["--query", "--json"];
        } else {
            $arguments = ["--query", "--json", "-i", $interface];
        }

        // Keep the command line empty for now
        $this->process = new ProcessBuilder;
        $this->process->setArguments($arguments);
    }

    /**
     * Find the vnstat executable.
     *
     * @return $this
     * @throws ExecutableNotFoundException
     */
    protected function findVnstat()
    {
        $finder = new Process("which vnstat");

        $finder->run();

        if (!$finder->isSuccessful()) {
            throw new ExecutableNotFoundException($finder->getErrorOutput());
        }

        $this->setExecutablePath(trim($finder->getOutput()));

        $this->process->setPrefix($this->executable);

        return $this;
    }

    /**
     * Run the query
     *
     * @return $this
     * @throws \Symfony\Component\Process\Exception\ProcessFailedException
     */
    public function run()
    {
        $this->findVnstat();

        $process = $this->process->getProcess();
        $process->run();

        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        $this->setJson(trim($process->getOutput()));

        return $this;
    }

    /**
     * Parse the json to a normalized class
     *
     * @return Response
     */
    public function parseJson()
    {
        return new VnstatResponse($this->getJson());
    }

    /**
     * Create a new instance
     *
     * @param  string|array  $interface
     * @return Response
     */
    public static function get($interface = null)
    {
        $vnstat = new static($interface);

        $vnstat->run();

        return $vnstat->parseJson();
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
