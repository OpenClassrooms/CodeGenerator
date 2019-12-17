<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\Controller;

use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\Models\Domain\SubDomain\PatchFunctionalEntity;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Requestors\Domain\SubDomain\EditFunctionalEntityRequest;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Requestors\Domain\SubDomain\EditFunctionalEntityRequestBuilder;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\EditFunctionalEntity;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class PatchFunctionalEntityController extends AbstractApiController
{
    /**
     * @Security("")
     */
    public function patchAction(Request $request, int $functionalEntityId): JsonResponse
    {
        try {
            $this->checkContentIsNotEmpty($request);

            $model = new PatchFunctionalEntity($request->getContent());
            $this->validate($model);

            $this->saveFunctionalEntity($functionalEntityId, $model);

            return $this->createUpdatedResponse();
        } catch (FunctionalEntityNotFoundException $e) {
            throw $this->createNotFoundException();
        }
    }

    /**
     * @throws \OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Gateways\Domain\SubDomain\Exceptions\FunctionalEntityNotFoundException
     */
    private function saveFunctionalEntity(int $functionalEntityId, PatchFunctionalEntity $model): void
    {
        $this->get(EditFunctionalEntity::class)->execute($this->buildRequest($functionalEntityId, $model));
    }

    /**
     * @param int                   $functionalEntityId
     * @param PatchFunctionalEntity $model
     *
     * @return EditFunctionalEntityRequest
     */
    private function buildRequest(
        int $functionalEntityId,
        PatchFunctionalEntity $model
    ): EditFunctionalEntityRequest {
        $requestBuilder = $this->get(EditFunctionalEntityRequestBuilder::class)
            ->create()
            ->withFunctionalEntityId($functionalEntityId);

        !$model->field1 ?: $requestBuilder->withField1($model->field1);
        !$model->field2 ?: $requestBuilder->withField2($model->field2);
        !$model->field3 ?: $requestBuilder->withField3($model->field3);
        !$model->field4 ?: $requestBuilder->withField4($model->field4);

        return $requestBuilder->build();
    }
}

