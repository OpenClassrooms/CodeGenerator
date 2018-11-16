<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModelDetail;

use OpenClassrooms\CodeGenerator\FileObjects\FieldObject;

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
     * @var FieldObject[]
     */
    public $fields = [];

    /**
     * @var string
     */
    public $namespace;

    /**
     * @var string
     */
    public $shortClassName;

    public $templatePath = 'Api/ViewModels/ViewModelDetail.php.twig';

    public function getParentShortClassName(): string
    {
        return str_replace('Detail', '', $this->shortClassName);
    }

    public function getTemplatePath(): string
    {
        return $this->templatePath;
    }
}
