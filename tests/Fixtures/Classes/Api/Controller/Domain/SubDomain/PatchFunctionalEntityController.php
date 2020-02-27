<?php

// Auto Generated by OpenClassrooms Code Generator

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\Controller\Domain\SubDomain;

use OC\ApiBundle\Framework\FrameworkBundle\Controller\AbstractApiController;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\Models\Domain\SubDomain\PatchFunctionalEntityModel;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain\FunctionalEntityViewModelDetail;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain\FunctionalEntityViewModelDetailAssembler;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Gateways\Domain\SubDomain\Exceptions\FunctionalEntityNotFoundException;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Requestors\Domain\SubDomain\EditFunctionalEntityRequest;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Requestors\Domain\SubDomain\EditFunctionalEntityRequestBuilder;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityDetailResponse;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\EditFunctionalEntity;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class PatchFunctionalEntityController extends AbstractApiController
{
    /**
     * @var EditFunctionalEntityRequestBuilder
     */
    private $editFunctionalEntityRequestBuilder;

    /**
     * @var FunctionalEntityViewModelDetailAssembler
     */
    private $functionalEntityViewModelDetailAssembler;

    public function __construct(
        EditFunctionalEntityRequestBuilder $builder,
        FunctionalEntityViewModelDetailAssembler $assembler
    ) {
        $this->editFunctionalEntityRequestBuilder = $builder;
        $this->functionalEntityViewModelDetailAssembler = $assembler;
    }

    /**
     * @Route("/functional-entities/{functionalEntityId}", name="openclassrooms_codegenerator_tests_fixtures_classes_api_sub_domain_functional_entity_patch", methods={"PATCH"}, requirements={"functionalEntityId"="^\d{1,9}$"})
     *
     * @Security("")
     * @throws NotFoundHttpException
     */
    public function patchAction(Request $request, int $functionalEntityId): JsonResponse
    {
        try {
            /** @var PatchFunctionalEntityModel $model */
            $model = $this->getModelFromRequest(PatchFunctionalEntityModel::class);
            $response = $this->updateFunctionalEntity($functionalEntityId, $model);

            return $this->createUpdatedResponse($this->buildViewModel($response));
        } catch (FunctionalEntityNotFoundException $e) {
            $this->throwNotFoundException();
        }
    }

    /**
     * @throws FunctionalEntityNotFoundException
     */
    private function updateFunctionalEntity(int $functionalEntityId, PatchFunctionalEntityModel $model): void
    {
        $this->get(EditFunctionalEntity::class)->execute($this->buildRequest($functionalEntityId, $model));
    }

    private function buildRequest(int $functionalEntityId, PatchFunctionalEntityModel $model): EditFunctionalEntityRequest
    {
        $requestBuilder = $this->editFunctionalEntityRequestBuilder
            ->create()
            ->withFunctionalEntityId($functionalEntityId);

        !$model->field1 ?: $requestBuilder->withField1($model->field1);
        !$model->field2 ?: $requestBuilder->withField2($model->field2);
        !$model->field3 ?: $requestBuilder->withField3($model->field3);
        !$model->field4 ?: $requestBuilder->withField4($model->field4);

        return $requestBuilder->build();
    }

    private function buildViewModel(FunctionalEntityDetailResponse $response): FunctionalEntityViewModelDetail
    {
        return $this->functionalEntityViewModelDetailAssembler->create($response);
    }
}

