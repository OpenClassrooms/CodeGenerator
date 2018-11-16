<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Services;

use OpenClassrooms\CodeGenerator\OldClassObjects\ClassObject;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
interface ControllerClassObjectService
{
    public function getListController(string $className, bool $admin = false): ClassObject;

    public function getShowController(string $className, bool $admin = false): ClassObject;
}
