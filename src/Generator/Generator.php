<?php

namespace OpenClassrooms\CodeGenerator\Generator;

use OpenClassrooms\CodeGenerator\Services\ClassObjectService;
use OpenClassrooms\CodeGenerator\Utility\ClassNameUtility;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
abstract class Generator
{
    use ClassNameUtility;

    /**
     * @var string
     */
    protected $rootNamespace;

    /**
     * @var \Twig_Environment
     */
    protected $templating;

    /**
     * @var \OpenClassrooms\CodeGenerator\Services\ClassObjectService
     */
    protected $classObjectService;

    public function setClassObjectService(ClassObjectService $classObjectService)
    {
        $this->classObjectService = $classObjectService;
    }

    public function setRootNamespace(string $rootNamespace)
    {
        $this->rootNamespace = $rootNamespace;
    }

    public function setTemplating(\Twig_Environment $templating)
    {
        $this->templating = $templating;
    }

    /**
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    protected function render(string $template, array $parameters): string
    {
        return $this->templating->render($template, $parameters);
    }

    /**
     * @return string[]
     */
    protected function getPublicFieldsFromClass(string $className): array
    {
        $properties = [];
        $rc = new \ReflectionClass($className);
        $rps = $rc->getProperties(\ReflectionProperty::IS_PUBLIC);
        foreach ($rps as $rp) {
            $properties[] = $rp->getName();
        }

        return $properties;
    }

}
