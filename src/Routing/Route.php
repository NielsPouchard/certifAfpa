<?php

namespace App\Routing;

class Route extends \Symfony\Component\Routing\Route
{
    protected $path = '/';
    protected $host = '';
    protected $schemes = [];
    protected $methods = [];
    protected $defaults = [];
    protected $requirements = [];
    protected $options = [];
    protected $condition = '';

    public function __construct(string $path, array $defaults = [], array $requirements = [], array $options = [], ?string $host = '', $schemes = [], $methods = [], ?string $condition = '')
    {
        parent::__construct($path, $defaults, $requirements, $options, $host, $schemes, $methods, $condition);
    }
}
