<?php

namespace OpenClassrooms\CodeGenerator\Services;

use OpenClassrooms\CodeGenerator\ClassObjects\ClassObject;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
interface FormClassObjectService
{
    public function getEditFormType(string $className): ClassObject;

    /**
     * @return ClassObject[]
     */
    public function getEditModelTypes(string $className): array;
}
