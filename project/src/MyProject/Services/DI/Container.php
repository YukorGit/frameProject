<?php

namespace MyProject\Services\DI;

use MyProject\Exceptions\NotFoundException;

class Container
{
    private array $services = [];
    private array $instantiatedServices = [];

    public function set(string $id, callable $factory): void
    {
        $this->services[$id] = $factory;
    }

    public function get(string $id)
    {
        if (isset($this->instantiatedServices[$id])) {
            return $this->instantiatedServices[$id];
        }

        if (!isset($this->services[$id])) {
            throw new NotFoundException('Service not found: ' . $id);
        }

        $factory = $this->services[$id];
        $this->instantiatedServices[$id] = $factory($this);

        return $this->instantiatedServices[$id];
    }
}