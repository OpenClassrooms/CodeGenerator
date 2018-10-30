<?php

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Services;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\FileObjects\FileObjectFactory;
use OpenClassrooms\CodeGenerator\Gateway\FileObjectGateway;
use OpenClassrooms\CodeGenerator\Services\TemplatingFactory;
use Twig\Loader\ExistsLoaderInterface;
use Twig_Error_Loader;
use Twig_Source;

/**
 * @author Samuel Gomis <samuel.gomis@openclassrooms.com>
 */
class TemplatingMock extends \Twig_Environment
{
    public function __construct(){

    }

    public function render($name, array $context = array())
    {
        return new \Twig_Environment();
    }

}
