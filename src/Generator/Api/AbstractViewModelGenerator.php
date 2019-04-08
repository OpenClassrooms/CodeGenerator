<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Entities\UseCaseResponseFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\ViewModelFileObjectFactory;
use OpenClassrooms\CodeGenerator\Generator\AbstractGenerator;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
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
        string $baseNamespace = null
    ): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create($type, $domain, $entity, $baseNamespace);
    }

    protected function createViewModelFileObject(
        string $type,
        string $domain,
        string $entity,
        string $baseNamespace = null
    ): FileObject
    {
        return $this->viewModelFileObjectFactory->create($type, $domain, $entity, $baseNamespace);
    }
}
