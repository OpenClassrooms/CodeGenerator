<?php

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Services;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class TemplatingMock extends \Twig_Environment
{
    public function __construct()
    {
        parent::__construct(
            new \Twig_Loader_Filesystem(__DIR__.'/../../../src/Skeleton'),
            [
                'debug' => true,
                'cache' => false,
                'strict_variables' => true,
                'autoescape' => false,
            ]
        );
        $this->addGlobal('author', 'Romain Kuzniak');
        $this->addGlobal('authorEmail', 'romain.kuzniak@openclassrooms.com');
    }
}
