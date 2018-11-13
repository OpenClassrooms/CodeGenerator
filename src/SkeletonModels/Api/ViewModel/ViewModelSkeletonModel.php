<?php

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModel;

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
     * @var array
     */
    public $fields = [];

    /**
     * @var string
     */
    public $shortClassName;

    /**
     * @var string
     */
    public $namespace;

    public $templatePath = 'Api/ViewModels/ViewModel.php.twig';

    public function getTemplatePath(): string
    {
        return $this->templatePath;
    }
}
