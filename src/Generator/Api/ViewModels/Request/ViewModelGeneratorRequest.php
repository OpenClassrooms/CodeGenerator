<?php

namespace Generator\Api\ViewModels\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
interface ViewModelGeneratorRequest extends GeneratorRequest
{
    public function getResponseClassName(): string;
}
