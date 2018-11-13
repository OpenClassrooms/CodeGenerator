<?php

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModelDetail;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
abstract class ViewModelDetailSkeletonModel
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

    public $templatePath = 'Api/ViewModels/ViewModelDetail.php.twig';

    public function getTemplatePath(): string
    {
        return $this->templatePath;
    }

    public function getParentShortClassName(): string
    {
        return str_replace('Detail','', $this->shortClassName);
    }
}
