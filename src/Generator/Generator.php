<?php

namespace OpenClassrooms\CodeGenerator\Generator;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
interface Generator
{
    /**
     * @return string[]
     */
    public function generate(string $className): array;
}
