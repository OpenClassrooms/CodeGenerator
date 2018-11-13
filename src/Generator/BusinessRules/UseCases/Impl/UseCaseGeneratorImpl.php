<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\OldAbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\UseCaseGenerator;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class UseCaseGeneratorImpl extends OldAbstractUseCaseGenerator implements UseCaseGenerator
{
    public function generate(string $className, array $parameters = []): array
    {
        $useCase = $this->useCaseClassObjectService->getUseCase($className);

        $useCaseContent = $this->render(
            '/BusinessRules/UseCases/GetUseCase.php.twig',
            [
                'useCaseNamespace'      => $useCase->getNamespace(),
                'useCaseShortClassName' => $useCase->getShortClassName(),
//                'useCaseDetailResponseClassName' => $useCaseDetailResponse->getClassName(),
//                'useCaseDetailResponseAssemblerClassName' => $useCaseDetailResponseAssembler->getClassName(),
//                'useCaseDetailResponseAssemblerShortClassName' => $useCaseDetailResponseAssembler->getShortClassName(),
//                'useCaseDetailResponseAssemblerFieldName' => $useCaseDetailResponseAssembler->getFieldName(),
//                'useCaseDetailResponseAssemblerFieldNameUC' => ucfirst($useCaseDetailResponseAssembler->getFieldName()),
//                'useCaseRequestClassName' => $useCaseRequest->getClassName(),
//                'entityFieldName' => $entity->getFieldName(),
//                'gatewayClassName' => $gateway->getClassName(),
//                'gatewayShortClassName' => $gateway->getShortClassName(),
//                'gatewayFieldName' => $gateway->getFieldName(),
//                'gatewayFieldNameUC' => ucfirst($gateway->getFieldName()),
//                'entityNotFoundExceptionClassName' => $entityNotFoundException->getClassName()
            ]
        );

        return [$useCase->getClassName() => 'content'];
    }
}
