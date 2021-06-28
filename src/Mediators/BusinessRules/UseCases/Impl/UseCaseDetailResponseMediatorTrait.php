<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\Responses\UseCaseDetailResponseMediator;

trait UseCaseDetailResponseMediatorTrait
{
    private UseCaseDetailResponseMediator $useCaseDetailResponseMediator;

    public function setUseCaseDetailResponseMediator(UseCaseDetailResponseMediator $useCaseDetailResponseMediator): void
    {
        $this->useCaseDetailResponseMediator = $useCaseDetailResponseMediator;
    }

    private function generateUseCaseDetailSources(string $className): array
    {
        $fileObjects[] = $this->useCaseDetailResponseMediator->generateUseCaseDetailResponseAssemblerGenerator(
            $className
        );
        $fileObjects[] = $this->useCaseDetailResponseMediator->generateUseCaseDetailResponseAssemblerImplGenerator(
            $className
        );
        $fileObjects[] = $this->useCaseDetailResponseMediator->generateUseCaseDetailResponseDTOGenerator($className);
        $fileObjects[] = $this->useCaseDetailResponseMediator->generateUseCaseDetailResponseGenerator($className);

        return $fileObjects;
    }

    private function generateUseCaseDetailTestSources(string $className): array
    {
        $fileObjects[] = $this->useCaseDetailResponseMediator->generateUseCaseDetailResponseAssemblerMockGenerator(
            $className
        );
        $fileObjects[] = $this->useCaseDetailResponseMediator->generateUseCaseDetailResponseStubGenerator($className);
        $fileObjects[] = $this->useCaseDetailResponseMediator->generateUseCaseDetailResponseTestCaseGenerator(
            $className
        );

        return $fileObjects;
    }
}
