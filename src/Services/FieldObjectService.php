<?php

namespace OpenClassrooms\CodeGenerator\Services;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
interface FieldObjectService
{
    /**
     * @return \OpenClassrooms\CodeGenerator\ClassObjects\FieldObject[]
     */
    public function getParentPublicClassFields(string $className): array;

    /**
     * @return \OpenClassrooms\CodeGenerator\ClassObjects\FieldObject[]
     */
    public function getPublicClassFields(string $className): array;

    /**
     * @return \OpenClassrooms\CodeGenerator\ClassObjects\FieldObject[]
     */
    public function getProtectedClassFields(string $className): array;
}
