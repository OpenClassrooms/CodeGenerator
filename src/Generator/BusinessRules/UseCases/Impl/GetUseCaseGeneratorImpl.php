<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\GetUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\OldAbstractUseCaseGenerator;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class GetUseCaseGeneratorImpl extends OldAbstractUseCaseGenerator implements GetUseCaseGenerator
{
    public function generate(string $className, array $parameters = []): array
    {
        $useCase = $this->useCaseClassObjectService->getGetUseCase($className);

        $useCaseDetailResponseAssembler =
            $this->useCaseClassObjectService->getUseCaseDetailResponseAssembler($className);
        $useCaseDetailResponse =
            $this->useCaseClassObjectService->getUseCaseDetailResponse($className);
        $useCaseRequest = $this->useCaseClassObjectService->getGetUseCaseRequest($className);
        $gateway = $this->entityClassObjectService->getGatewayFromClassName($className);
        $entity = $this->entityClassObjectService->getEntityFromClassName($className);
        $entityNotFoundException = $this->entityClassObjectService->getEntityNotFoundException($className);

        $useCaseContent = $this->render(
            '/BusinessRules/UseCases/GetUseCase.php.twig',
            [
                'useCaseNamespace'                             => $useCase->getNamespace(),
                'useCaseShortClassName'                        => $useCase->getShortClassName(),
                'useCaseDetailResponseClassName'               => $useCaseDetailResponse->getClassName(),
                'useCaseDetailResponseAssemblerClassName'      => $useCaseDetailResponseAssembler->getClassName(),
                'useCaseDetailResponseAssemblerShortClassName' => $useCaseDetailResponseAssembler->getShortClassName(),
                'useCaseDetailResponseAssemblerFieldName'      => $useCaseDetailResponseAssembler->getFieldName(),
                'useCaseDetailResponseAssemblerFieldNameUC'    => ucfirst($useCaseDetailResponseAssembler->getFieldName()),
                'useCaseRequestClassName'                      => $useCaseRequest->getClassName(),
                'entityFieldName'                              => $entity->getFieldName(),
                'gatewayClassName'                             => $gateway->getClassName(),
                'gatewayShortClassName'                        => $gateway->getShortClassName(),
                'gatewayFieldName'                             => $gateway->getFieldName(),
                'gatewayFieldNameUC'                           => ucfirst($gateway->getFieldName()),
                'entityNotFoundExceptionClassName'             => $entityNotFoundException->getClassName(),
            ]
        );

        $useCaseRequestContent = $this->render(
            '/BusinessRules/Requestors/GetUseCaseRequest.php.twig',
            [
                'useCaseRequestNamespace'      => $useCaseRequest->getNamespace(),
                'useCaseRequestShortClassName' => $useCaseRequest->getShortClassName(),
            ]
        );

        $useCaseRequestDTO = $this->useCaseClassObjectService->getGetUseCaseRequestDTO($className);
        $useCaseRequestDTOContent = $this->render(
            '/BusinessRules/UseCases/DTO/Request/GetUseCaseRequestDTO.php.twig',
            [
                'useCaseRequestDTONamespace'      => $useCaseRequestDTO->getNamespace(),
                'useCaseRequestDTOShortClassName' => $useCaseRequestDTO->getShortClassName(),
                'useCaseRequestClassName'         => $useCaseRequest->getClassName(),
                'useCaseRequestShortClassName'    => $useCaseRequest->getShortClassName(),
            ]
        );

        $useCaseRequestBuilder = $this->useCaseClassObjectService->getGetUseCaseRequestBuilder($className);
        $useCaseRequestBuilderContent = $this->render(
            '/BusinessRules/Requestors/GetUseCaseRequestBuilder.php.twig',
            [
                'useCaseRequestBuilderNamespace'      => $useCaseRequestBuilder->getNamespace(),
                'useCaseRequestBuilderShortClassName' => $useCaseRequestBuilder->getShortClassName(),
                'useCaseRequestShortClassName'        => $useCaseRequest->getShortClassName(),
            ]
        );

        $useCaseRequestBuilderImpl = $this->useCaseClassObjectService->getGetUseCaseRequestBuilderImpl($className);
        $useCaseRequestBuilderContentImpl = $this->render(
            '/BusinessRules/UseCases/DTO/Request/GetUseCaseRequestBuilderImpl.php.twig',
            [
                'useCaseRequestBuilderImplNamespace'      => $useCaseRequestBuilderImpl->getNamespace(),
                'useCaseRequestBuilderImplShortClassName' => $useCaseRequestBuilderImpl->getShortClassName(),
                'useCaseRequestBuilderClassName'          => $useCaseRequestBuilder->getClassName(),
                'useCaseRequestBuilderShortClassName'     => $useCaseRequestBuilder->getShortClassName(),
                'useCaseRequestShortClassName'            => $useCaseRequest->getShortClassName(),
                'useCaseRequestClassName'                 => $useCaseRequest->getClassName(),
                'useCaseRequestDTOClassName'              => $useCaseRequestDTO->getClassName(),
                'useCaseRequestDTOShortClassName'         => $useCaseRequestDTO->getShortClassName(),
            ]
        );

        $useCaseResponse = $this->useCaseClassObjectService->getUseCaseResponse($className);
        $useCaseResponseContent = $this->render(
            '/BusinessRules/Responders/UseCaseResponse.php.twig',
            [
                'useCaseResponseNamespace'      => $useCaseResponse->getNamespace(),
                'useCaseResponseShortClassName' => $useCaseResponse->getShortClassName(),
                'fields'                        => $this->fieldObjectService->getProtectedClassFields($className),
            ]
        );

        $useCaseDetailResponseContent = $this->render(
            '/BusinessRules/Responders/UseCaseDetailResponse.php.twig',
            [
                'useCaseDetailResponseNamespace'      => $useCaseDetailResponse->getNamespace(),
                'useCaseDetailResponseShortClassName' => $useCaseDetailResponse->getShortClassName(),
                'useCaseResponseClassName'            => $useCaseResponse->getClassName(),
                'useCaseResponseShortClassName'       => $useCaseResponse->getShortClassName(),
            ]
        );

        $useCaseDetailResponseAssemblerContent = $this->render(
            '/BusinessRules/Responders/UseCaseDetailResponseAssembler.php.twig',
            [
                'useCaseDetailResponseAssemblerNamespace'      => $useCaseDetailResponseAssembler->getNamespace(),
                'useCaseDetailResponseAssemblerShortClassName' => $useCaseDetailResponseAssembler->getShortClassName(),
                'entityClassName'                              => $entity->getClassName(),
                'entityShortClassName'                         => $entity->getShortClassName(),
                'entityFieldName'                              => $entity->getFieldName(),
                'useCaseDetailResponseShortClassName'          => $useCaseDetailResponse->getShortClassName(),
            ]
        );

        $useCaseResponseDTO = $this->useCaseClassObjectService->getUseCaseResponseDTO($className);
        $useCaseResponseDTOContent = $this->render(
            '/BusinessRules/UseCases/DTO/Response/UseCaseResponseDTO.php.twig',
            [
                'useCaseResponseDTONamespace'      => $useCaseResponseDTO->getNamespace(),
                'useCaseResponseDTOShortClassName' => $useCaseResponseDTO->getShortClassName(),
                'useCaseResponseClassName'         => $useCaseResponse->getClassName(),
                'useCaseResponseShortClassName'    => $useCaseResponse->getShortClassName(),
                'fields'                           => $this->fieldObjectService->getProtectedClassFields($className),
            ]
        );

        $useCaseDetailResponseDTO = $this->useCaseClassObjectService->getUseCaseDetailResponseDTO($className);
        $useCaseDetailResponseDTOContent = $this->render(
            '/BusinessRules/UseCases/DTO/Response/UseCaseDetailResponseDTO.php.twig',
            [
                'useCaseDetailResponseDTONamespace'      => $useCaseDetailResponseDTO->getNamespace(),
                'useCaseDetailResponseDTOShortClassName' => $useCaseDetailResponseDTO->getShortClassName(),
                'useCaseResponseDTOShortClassName'       => $useCaseResponseDTO->getShortClassName(),
                'useCaseDetailResponseClassName'         => $useCaseDetailResponse->getClassName(),
                'useCaseDetailResponseShortClassName'    => $useCaseDetailResponse->getShortClassName(),
            ]
        );

        $useCaseResponseAssemblerTrait = $this->useCaseClassObjectService->getUseCaseResponseAssemblerTrait($className);
        $useCaseResponseAssemblerTraitContent = $this->render(
            '/BusinessRules/UseCases/DTO/Response/UseCaseResponseAssemblerTrait.php.twig',
            [
                'useCaseResponseAssemblerTraitNamespace'      => $useCaseResponseAssemblerTrait->getNamespace(),
                'useCaseResponseAssemblerTraitShortClassName' => $useCaseResponseAssemblerTrait->getShortClassName(),
                'useCaseResponseClassName'                    => $useCaseResponse->getClassName(),
                'useCaseResponseShortClassName'               => $useCaseResponse->getShortClassName(),
                'useCaseResponseDTOClassName'                 => $useCaseResponseDTO->getClassName(),
                'entityClassName'                             => $entity->getClassName(),
                'entityShortClassName'                        => $entity->getShortClassName(),
                'entityFieldName'                             => $entity->getFieldName(),
                'fields'                                      => $this->fieldObjectService->getProtectedClassFields($className),
            ]
        );

        $useCaseDetailResponseAssemblerImpl = $this->useCaseClassObjectService->getUseCaseDetailResponseAssemblerImpl(
            $className
        );
        $useCaseDetailResponseAssemblerImplContent = $this->render(
            '/BusinessRules/UseCases/DTO/Response/UseCaseDetailResponseAssemblerImpl.php.twig',
            [
                'useCaseDetailResponseAssemblerImplNamespace'      => $useCaseDetailResponseAssemblerImpl->getNamespace(),
                'useCaseDetailResponseAssemblerImplShortClassName' => $useCaseDetailResponseAssemblerImpl->getShortClassName(
                ),
                'useCaseDetailResponseAssemblerClassName'      => $useCaseDetailResponseAssembler->getClassName(),
                'useCaseDetailResponseAssemblerShortClassName' => $useCaseDetailResponseAssembler->getShortClassName(),
                'useCaseResponseAssemblerTraitShortClassName'  => $useCaseResponseAssemblerTrait->getShortClassName(),
                'useCaseDetailResponseClassName'               => $useCaseDetailResponse->getClassName(),
                'useCaseDetailResponseShortClassName'          => $useCaseDetailResponse->getShortClassName(),
                'useCaseDetailResponseDTOShortClassName'       => $useCaseDetailResponseDTO->getShortClassName(),
                'entityClassName'                              => $entity->getClassName(),
                'entityShortClassName'                         => $entity->getShortClassName(),
                'entityFieldName'                              => $entity->getFieldName(),
            ]
        );

        $find = true;
        $findAll = array_key_exists(self::USE_CASE_GET_ALL, $parameters) ? $parameters[self::USE_CASE_GET_ALL] : false;
        $gatewayContent = $this->render(
            '/BusinessRules/Gateways/Gateway.php.twig',
            [
                'find'                             => $find,
                'findAll'                          => $findAll,
                'gatewayNamespace'                 => $gateway->getNamespace(),
                'gatewayShortClassName'            => $gateway->getShortClassName(),
                'entityClassName'                  => $entity->getClassName(),
                'entityNotFoundExceptionClassName' => $entityNotFoundException->getClassName(),
            ]
        );

        $repository = $this->entityClassObjectService->getRepository($className);
        $repositoryContent = $this->render(
            '/App/Repository/Repository.php.twig',
            [
                'find'                                  => $find,
                'findAll'                               => $findAll,
                'repositoryNamespace'                   => $repository->getNamespace(),
                'repositoryShortClassName'              => $repository->getShortClassName(),
                'entityFieldName'                       => $entity->getFieldName(),
                'gatewayClassName'                      => $gateway->getClassName(),
                'gatewayShortClassName'                 => $gateway->getShortClassName(),
                'entityNotFoundExceptionClassName'      => $entityNotFoundException->getClassName(),
                'entityNotFoundExceptionShortClassName' => $entityNotFoundException->getShortClassName(),
            ]
        );

        return [
            $useCase->getClassName()                            => $useCaseContent,
            $useCaseRequest->getClassName()                     => $useCaseRequestContent,
            $useCaseRequestDTO->getClassName()                  => $useCaseRequestDTOContent,
            $useCaseRequestBuilder->getClassName()              => $useCaseRequestBuilderContent,
            $useCaseRequestBuilderImpl->getClassName()          => $useCaseRequestBuilderContentImpl,
            $useCaseResponse->getClassName()                    => $useCaseResponseContent,
            $useCaseDetailResponse->getClassName()              => $useCaseDetailResponseContent,
            $useCaseDetailResponseAssembler->getClassName()     => $useCaseDetailResponseAssemblerContent,
            $useCaseResponseDTO->getClassName()                 => $useCaseResponseDTOContent,
            $useCaseDetailResponseDTO->getClassName()           => $useCaseDetailResponseDTOContent,
            $useCaseResponseAssemblerTrait->getClassName()      => $useCaseResponseAssemblerTraitContent,
            $useCaseDetailResponseAssemblerImpl->getClassName() => $useCaseDetailResponseAssemblerImplContent,
            $gateway->getClassName()                            => $gatewayContent,
            $repository->getClassName()                         => $repositoryContent,
        ];
    }
}
