<?php

namespace OpenClassrooms\CodeGenerator\Generator\SkeletonModels\ViewModels\ViewModel;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
abstract class ViewModel
{
    /**
     * @var string
     */
    public $className;

    /**
     * @var string
     */
    public $namespace;

    /**
     * @var array
     */
    public $fields = [];
}
