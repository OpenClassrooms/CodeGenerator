<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\Controller;

use Carbon\CarbonImmutable;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\Models\Domain\SubDomain\PostFunctionalEntityModel;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain\FunctionalEntityViewModelDetail;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain\FunctionalEntityViewModelDetailAssembler;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Gateways\Domain\SubDomain\Exceptions\FunctionalEntityNotFoundException;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Requestors\Domain\SubDomain\CreateFunctionalEntityRequestBuilder;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityDetailResponse;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\CreateFunctionalEntity;
use Symfony\Component\HttpFoundation\JsonResponse;

class PostFunctionalEntityController extends AbstractApiController
{
    /**
     * @var CreateFunctionalEntityRequestBuilder
     */
    private $createFunctionalEntityRequestBuilder;

    /**
     * @var FunctionalEntityViewModelDetailAssembler
     */
    private $functionalEntityViewModelDetailAssembler;

    public function __construct(
        FunctionalEntityViewModelDetailAssembler $assembler,
        CreateFunctionalEntityRequestBuilder $builder
    ) {
        $this->functionalEntityViewModelDetailAssembler = $assembler;
        $this->createFunctionalEntityRequestBuilder = $builder;
    }

    /**
     * @Security("")
     */
    public function postAction(): JsonResponse
    {
        try {
            $model = $this->getModelFromRequest(PostFunctionalEntityModel::class);
            $response = $this->createFunctionalEntity($model);

            return $this->createCreatedResponse($this->generateLocationUrl(), $this->buildViewModel($response));
        } catch (FunctionalEntityNotFoundException $e) {
            $this->throwNotFoundException();
        }
    }

    private function createFunctionalEntity(PostFunctionalEntityModel $model): FunctionalEntityDetailResponse
    {
        return $this->get(CreateFunctionalEntity::class)->execute(
            $this->createFunctionalEntityRequestBuilder
                ->create()
                ->withField1($model->field1)
                ->withField2($model->field2)
                ->withField3($model->field3)
                ->withField4((new CarbonImmutable(($model->field4))))
                ->build()
        );
    }

    private function generateLocationUrl(): string
    {
        return $this->generateUrl('', []);
    }

    private function buildViewModel(FunctionalEntityDetailResponse $response): FunctionalEntityViewModelDetail
    {
        return $this->functionalEntityViewModelDetailAssembler->create($response);
    }
}
