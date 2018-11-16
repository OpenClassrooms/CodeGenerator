<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Services;

use OpenClassrooms\CodeGenerator\OldClassObjects\ClassObject;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
interface EntityClassObjectService
{
    public function getEntityFromClassName(string $className): ClassObject;

    public function getEntityNotFoundException(string $className): ClassObject;

    public function getGatewayFromClassName(string $className): ClassObject;

    public function getRepository(string $className): ClassObject;
}
