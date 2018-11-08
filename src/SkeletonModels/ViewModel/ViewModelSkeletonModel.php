<?php

namespace OpenClassrooms\CodeGenerator\SkeletonModels\ViewModel;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
abstract class ViewModelSkeletonModel
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
