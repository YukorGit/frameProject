<?php

namespace MyProject\Cli;

use MyProject\Exceptions\CliException;

class Gatekeeper extends AbstractCommand
{
    public function execute()
    {
        echo 'Hello, ' . $this->getParam(). PHP_EOL;
    }

    protected function checkParam()
    {
        if (empty($this->param)) {
            throw new CliException('Please, introduce yourself!');
        }
    }

    protected function getParam(): string
    {
        $str = implode(' ', $this->param);
        return ucfirst($str);
    }
}