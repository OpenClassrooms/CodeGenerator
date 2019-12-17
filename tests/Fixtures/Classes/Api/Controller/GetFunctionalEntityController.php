<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\Controller;

use OC\ApiBundle\Framework\FrameworkBundle\Controller\AbstractApiController;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain\FunctionalEntityViewModel;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Gateways\Domain\SubDomain\Exceptions\FunctionalEntityNotFoundException;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Requestors\Domain\SubDomain\GetFunctionalEntityRequestBuilder;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityDetailResponseAssembler;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityResponse;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\GetFunctionalEntity;
use Symfony\Component\HttpFoundation\JsonResponse;

class GetFunctionalEntityController extends AbstractApiController
{
    /**
     * @Security("")
     */
    public function getAction(int $userId): JsonResponse
    {
        try {
            $functionalEntity = $this->getFunctionalEntity($userId);

            $vm = $this->createVm($functionalEntity);

            return $this->createJsonResponse($vm);
        } catch (FunctionalEntityNotFoundException $e) {
            throw $this->createNotFoundException();
        }
    }

    /**
     * @throws \OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Gateways\Domain\SubDomain\Exceptions\FunctionalEntityNotFoundException
     */
    private function getFunctionalEntity(int $id): FunctionalEntityResponse
    {
        return $this->get(GetFunctionalEntity::class)->execute(
            $this->get(GetFunctionalEntityRequestBuilder::class)
                ->create()
                ->withFunctionalEntityId($id)
                ->build()
        );
    }

    protected function createVm(FunctionalEntityResponse $functionalEntity): FunctionalEntityViewModel
    {
        return $this->get(FunctionalEntityDetailResponseAssembler::class)->create($functionalEntity);
    }
}
