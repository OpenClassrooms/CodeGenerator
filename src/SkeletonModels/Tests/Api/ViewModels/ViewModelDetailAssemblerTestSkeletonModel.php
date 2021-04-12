<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Entities\Object\FieldObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class ViewModelDetailAssemblerTestSkeletonModel extends AbstractSkeletonModel
{
    public string $templatePath = 'Tests/Api/ViewModels/ViewModelDetailAssemblerTest.php.twig';

    public string $useCaseDetailResponseStubClassName;

    public string $useCaseDetailResponseStubShortName;

    public string $viewModelDetailAssemblerClassName;

    public string $viewModelDetailAssemblerTestNamespace;

    public string $viewModelDetailAssemblerShortName;

    /**
     * @var FieldObject[]
     */
    public array $viewModelDetailFields;

    public string $viewModelDetailStubClassName;

    public string $viewModelDetailStubShortName;
}
