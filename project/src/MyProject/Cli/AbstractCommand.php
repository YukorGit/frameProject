<?php

namespace MyProject\Cli;

use MyProject\Exceptions\CliException;

abstract class AbstractCommand
{
    /** @var array */
    protected array $param;

    public function __construct(array $param)
    {
        $this->param = $param;
        $this->checkParam();
    }

    abstract public function execute();

    abstract protected function checkParam();

    abstract protected function getParam();
}