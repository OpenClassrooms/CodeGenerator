<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\EditEntityUseCaseMediator;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class EditEntityUseCaseMediatorImpl implements EditEntityUseCaseMediator
{
    use CommonEntityUseCaseMediatorsTrait;
    use EditEntityUseCaseGeneratorsTrait;
    use EntityUseCaseCommonRequestGeneratorTrait;
    use UseCaseDetailResponseMediatorTrait;

    /**
     * @return FileObject[]
     */
    protected function generateSources(string $className): array
    {
        $fileObjects[] = $this->generateEditEntityUseCaseGenerator($className);
        $fileObjects[] = $this->generateEditEntityUseCaseRequestBuilderGenerator($className);
        $fileObjects[] = $this->generateEditEntityUseCaseRequestBuilderImplGenerator($className);
        $fileObjects[] = $this->generateEditEntityUseCaseRequestDTOGenerator($className);
        $fileObjects[] = $this->generateEditEntityUseCaseRequestGenerator($className);
        $fileObjects[] = $this->generateEntityUseCaseCommonRequestTraitGenerator($className);

        return array_merge(
            $fileObjects,
            $this->generateUseCaseDetailSources($className),
            $this->generateEntitiesSources($className),
            $this->generateUseCaseResponseCommonSources($className)
        );
    }

    /**
     * @return FileObject[]
     */
    protected function generateTestSources(string $className): array
    {
        $fileObjects[] = $this->generateEditEntityUseCaseTestGenerator($className);
        $fileObjects[] = $this->entitiesMediator->generateInMemoryEntityGatewayGenerator($className);
        $fileObjects[] = $this->useCaseResponseCommonMediator->generateUseCaseResponseTestCaseGenerator($className);

        return array_merge($fileObjects, $this->generateUseCaseDetailTestSources($className));
    }
}
