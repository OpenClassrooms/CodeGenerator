<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\OldClassObjects\ClassObject;
use OpenClassrooms\CodeGenerator\Services\FieldObjectService;
use OpenClassrooms\CodeGenerator\Utility\ClassNameUtility;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
abstract class OldAbstractGenerator implements Generator
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
     * @var string
     */
    private $useCaseInterfaceClassName;

    /**
     * @var string
     */
    private $useCaseRequestInterfaceClassName;

    /**
     * @var string
     */
    private $useCaseResponseInterfaceClassName;

    abstract public function generate(GeneratorRequest $generatorRequest): FileObject;

    /**
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    protected function render(string $template, array $parameters): string
    {
        return $this->templating->render($template, $parameters);
    }

    public function setFieldObjectService(FieldObjectService $fieldObjectService)
    {
        $this->fieldObjectService = $fieldObjectService;
    }

    public function setTemplating(\Twig_Environment $templating)
    {
        $templating->addGlobal(
            'useCaseInterface',
            new ClassObject(
                $this->getNamespaceFromClassName($this->useCaseInterfaceClassName),
                $this->getShortClassNameFromClassName($this->useCaseInterfaceClassName)
            )
        );

        $templating->addGlobal(
            'useCaseRequestInterface',
            new ClassObject(
                $this->getNamespaceFromClassName($this->useCaseRequestInterfaceClassName),
                $this->getShortClassNameFromClassName($this->useCaseRequestInterfaceClassName)
            )
        );

        $templating->addGlobal(
            'useCaseResponseInterface',
            new ClassObject(
                $this->getNamespaceFromClassName($this->useCaseResponseInterfaceClassName),
                $this->getShortClassNameFromClassName($this->useCaseResponseInterfaceClassName)
            )
        );
        $this->templating = $templating;
    }

    public function setUseCaseInterfaceClassName(string $useCaseInterfaceClassName)
    {
        $this->useCaseInterfaceClassName = $useCaseInterfaceClassName;
    }

    public function setUseCaseRequestInterfaceClassName(string $useCaseRequestInterfaceClassName)
    {
        $this->useCaseRequestInterfaceClassName = $useCaseRequestInterfaceClassName;
    }

    public function setUseCaseResponseInterfaceClassName(string $useCaseResponseInterfaceClassName)
    {
        $this->useCaseResponseInterfaceClassName = $useCaseResponseInterfaceClassName;
    }
}
