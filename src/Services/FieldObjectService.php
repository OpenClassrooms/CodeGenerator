<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Services;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
interface FieldObjectService
{
    /**
     * @return \OpenClassrooms\CodeGenerator\Entities\FieldObject[]
     */
    public function getParentPublicClassFields(string $className): array;

    /**
     * @return \OpenClassrooms\CodeGenerator\Entities\FieldObject[]
     */
    public function getProtectedClassFields(string $className): array;

    /**
     * @return \OpenClassrooms\CodeGenerator\Entities\FieldObject[]
     */
    public function getPublicClassFields(string $className): array;

    /**
     * @return \OpenClassrooms\CodeGenerator\Entities\MethodObject\MethodObject[]
     */
    public function getAccessors(string $className): array;
}
