<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\FileObjects\UseCaseResponseFileObjectFactory;
use OpenClassrooms\CodeGenerator\FileObjects\ViewModelFileObjectFactory;
use OpenClassrooms\CodeGenerator\Generator\AbstractGenerator;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
abstract class AbstractViewModelGenerator extends AbstractGenerator
{
    /**
     * @var UseCaseResponseFileObjectFactory
     */
    private $useCaseResponseFileObjectFactory;

    /**
     * @var ViewModelFileObjectFactory
     */
    private $viewModelFileObjectFactory;

    public function setUseCaseResponseFileObjectFactory(
        UseCaseResponseFileObjectFactory $useCaseResponseFileObjectFactory
    )
    {
        $this->useCaseResponseFileObjectFactory = $useCaseResponseFileObjectFactory;
    }

    public function setViewModelFileObjectFactory(ViewModelFileObjectFactory $viewModelFileObjectFactory)
    {
        $this->viewModelFileObjectFactory = $viewModelFileObjectFactory;
    }

    protected function createUseCaseResponseFileObject(
        string $type,
        string $domain,
        string $entity,
        string $baseNamespace
    ): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create($type, $domain, $entity, $baseNamespace);
    }

    protected function createViewModelFileObject(
        string $type,
        string $domain,
        string $entity,
        string $baseNamespace
    ): FileObject
    {
        return $this->viewModelFileObjectFactory->create($type, $domain, $entity, $baseNamespace);
    }
}
