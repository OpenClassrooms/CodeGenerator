<?php

namespace OpenClassrooms\CodeGenerator\Generator;

use OpenClassrooms\CodeGenerator\Services\FieldObjectService;
use OpenClassrooms\CodeGenerator\Utility\ClassNameUtility;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
abstract class AbstractGenerator implements Generator
{
    use ClassNameUtility;

    /**
     * @var \OpenClassrooms\CodeGenerator\Services\FieldObjectService
     */
    protected $fieldObjectService;

    /**
     * @var \Twig_Environment
     */
    protected $templating;

    /**
     * @return string[]
     */
    abstract public function generate(string $className): array;

    public function setFieldObjectService(FieldObjectService $fieldObjectService)
    {
        $this->fieldObjectService = $fieldObjectService;
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

}
