<?php

namespace MyProject\Controllers;

use MyProject\View\View;

abstract class AbstractController
{
    /** @var View */
    protected View $view;


    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../../templates');
    }
}
