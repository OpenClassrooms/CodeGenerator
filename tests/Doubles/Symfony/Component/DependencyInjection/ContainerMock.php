<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Symfony\Component\DependencyInjection;

use Symfony\Component\DependencyInjection\Container;

class ContainerMock extends Container
{
    /**
     * @var array
     */
    public static $parameterMocks;

    /**
     * @var array
     */
    public static $serviceMocks;

    /**
     * @inheritDoc
     */
    public function __construct(array $services = [], array $parameters = [])
    {
        self::$parameterMocks = $parameters;
        self::$serviceMocks = $services;
    }

    /**
     * @inheritDoc
     */
    public function get($id, $invalidBehavior = self::EXCEPTION_ON_INVALID_REFERENCE)
    {
        return self::$serviceMocks[$id];
    }

    /**
     * @inheritDoc
     */
    public function getParameter($name)
    {
        return self::$parameterMocks[$name];
    }
}
