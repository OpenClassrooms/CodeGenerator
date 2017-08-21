<?php

namespace OpenClassrooms\CodeGenerator\Services;

use OpenClassrooms\CodeGenerator\ClassObjects\ClassObject;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
interface ControllerClassObjectService
{
    public function getShowController(string $className, bool $admin = false): ClassObject;

    public function getListController(string $className, bool $admin = false): ClassObject;
}
