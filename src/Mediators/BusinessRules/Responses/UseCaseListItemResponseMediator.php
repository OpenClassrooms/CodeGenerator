<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Mediators\BusinessRules\Responses;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface UseCaseListItemResponseMediator
{
    public function generateUseCaseListItemResponseAssemblerGenerator(string $className): FileObject;

    public function generateUseCaseListItemResponseAssemblerImplGenerator(string $className): FileObject;

    public function generateUseCaseListItemResponseAssemblerMockGenerator(string $className): FileObject;

    public function generateUseCaseListItemResponseDTOGenerator(string $className): FileObject;

    public function generateUseCaseListItemResponseGenerator(string $className): FileObject;

    public function generateUseCaseListItemResponseStubGenerator(string $className): FileObject;

    public function generateUseCaseListItemResponseTestCaseGenerator(string $className): FileObject;
}
