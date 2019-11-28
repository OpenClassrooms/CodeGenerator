<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Mediators\BusinessRules\Responses;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface UseCaseResponseCommonMediator
{
    public function generateUseCaseResponseAssemblerTraitGenerator(string $className): FileObject;

    public function generateUseCaseResponseCommonFieldTraitGenerator(string $className): FileObject;

    public function generateUseCaseResponseGenerator(string $className): FileObject;

    public function generateUseCaseResponseTestCaseGenerator(string $className): FileObject;
}
