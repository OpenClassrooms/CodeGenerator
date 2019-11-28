<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Mediators\BusinessRules\Entities;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
interface EntitiesMediator
{
    public function generateEntityGatewayGenerator(string $className): FileObject;

    public function generateEntityNotFoundExceptionGenerator(string $className): FileObject;

    public function generateEntityRepositoryGenerator(string $className): FileObject;

    public function generateEntityStubGenerator(string $className): FileObject;

    public function generateInMemoryEntityGatewayGenerator(string $className): FileObject;
}
