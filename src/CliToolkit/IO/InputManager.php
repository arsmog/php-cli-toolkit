<?php

/**
 * Reading data from standard input stream.
 */

namespace CliToolkit\IO;

class InputManager implements IOInterface
{
    /**
     * Data obtained by CliInput::scanf() method
     * @var array
     */
    private array $var;

    public function __construct()
    {
        $this->var = [];
    }

    /**
     * The method parses the global array of parameters $argv and returns an associative array.
     * =========
     * Input: name="Arseny Mogilev" email=arsmog@yahoo.com
     * Output: 
     * array(2) {
     *      ["name"]  => string(14) "Arseny Mogilev"
     *      ["email"] => string(16) "arsmog@yahoo.com"
     * }
     * =========
     * @global array $argv Array of command line arguments.
     * @return array
     */
    public function argv(): array
    {
        global $argv;
        $params = [];
        foreach ($argv as $index => $argument) {
            if ($index === 0) {
                continue;
            }
            preg_match("/^(.+)=(.+)$/", $argument, $matches);
            if (!empty($matches)) {
                $name = $matches[1];
                $value = $matches[2];
                $params[$name] = $value;
            }
        }
        return $params;
    }

    /**
     * Reading data from the standard input stream into a property of the InputManager class
     * @param string $var variable name
     * @throws \Exception
     * @return CliToolkit\IO\InputManager
     */
    public function scanf(string $var): InputManager
    {
        $name = preg_replace("/[^a-zA-Z_]/u", '', $var);
        if (empty($name)) {
            throw new \Exception("Only Latin characters and the underscore character can be used in the variable name.");
        }
        $this->{$name} = trim(fgets(STDIN));
        return $this;
    }

    /**
     * To reading data from non-existing properties
     */
    public function __get($name)
    {
        return $this->var[$name] ?? null;
    }

    /**
     * To write data to non-existent properties
     */
    public function __set($name, $value)
    {
        $this->var[$name] = $value;
    }
}