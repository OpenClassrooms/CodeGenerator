<?php

namespace OpenClassrooms\CodeGenerator\Services;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
interface TemplatingFactory
{
    public function create(array $config): \Twig_Environment;
}
