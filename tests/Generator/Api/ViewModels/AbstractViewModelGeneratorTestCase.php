<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Generator\Api\AbstractViewModelGenerator;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseResponseFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\ViewModelFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
abstract class AbstractViewModelGeneratorTestCase extends TestCase
{
    protected function buildViewModelGenerator(AbstractViewModelGenerator $viewModelGenerator): void
    {
        $viewModelGenerator->setUseCaseResponseFileObjectFactory(new UseCaseResponseFileObjectFactoryMock());
        $viewModelGenerator->setViewModelFileObjectFactory(new ViewModelFileObjectFactoryMock());
        $viewModelGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $viewModelGenerator->setTemplating(new TemplatingServiceMock());
    }
}
