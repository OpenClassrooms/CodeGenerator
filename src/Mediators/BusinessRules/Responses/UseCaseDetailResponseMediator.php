<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Mediators\BusinessRules\Responses;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface UseCaseDetailResponseMediator
{
    public function generateUseCaseDetailResponseAssemblerGenerator(string $className): FileObject;

    public function generateUseCaseDetailResponseAssemblerImplGenerator(string $className): FileObject;

    public function generateUseCaseDetailResponseAssemblerMockGenerator(string $className): FileObject;

    public function generateUseCaseDetailResponseDTOGenerator(string $className): FileObject;

    public function generateUseCaseDetailResponseGenerator(string $className): FileObject;

    public function generateUseCaseDetailResponseStubGenerator(string $className): FileObject;

    public function generateUseCaseDetailResponseTestCaseGenerator(string $className): FileObject;
}
