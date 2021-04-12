<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Entities\Object\FieldObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class ViewModelListItemAssemblerTestSkeletonModel extends AbstractSkeletonModel
{
    public string $templatePath = 'Tests/Api/ViewModels/ViewModelListItemAssemblerTest.php.twig';

    public string $useCaseListItemResponseStubClassName;

    public string $useCaseListItemResponseStubShortName;

    public string $viewModelListItemAssemblerClassName;

    public string $viewModelListItemAssemblerImplTestNamespace;

    public string $viewModelListItemAssemblerShortName;

    /**
     * @var FieldObject[]
     */
    public array $viewModelListItemFields;

    public string $viewModelListItemStubClassName;

    public string $viewModelListItemStubShortName;
}
