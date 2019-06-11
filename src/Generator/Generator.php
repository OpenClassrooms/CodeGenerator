<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator;

use OpenClassrooms\CodeGenerator\Entities\FileObject;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
interface Generator
{
    const ADMIN = 'admin';

    const USE_CASE_GET = 'use case get';

    const USE_CASE_GET_ALL = 'use case get all';

    public function generate(GeneratorRequest $generatorRequest): FileObject;
}
