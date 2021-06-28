<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Services\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\ConstObject;
use OpenClassrooms\CodeGenerator\Entities\Object\FieldObject;
use OpenClassrooms\CodeGenerator\Entities\Object\MethodObject;
use OpenClassrooms\CodeGenerator\Services\TemplatingService;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\TwigFilter;
use Twig\TwigFunction;

class TemplatingServiceImpl extends Environment implements TemplatingService
{
    protected string $skeletonDir;

    public function __construct(string $skeletonDir)
    {
        $this->skeletonDir = $skeletonDir;

        parent::__construct(
            new FilesystemLoader(__DIR__ . $this->skeletonDir),
            [
                'debug'            => true,
                'cache'            => false,
                'strict_variables' => true,
                'autoescape'       => false,
            ]
        );
        $this->addFilter($this->getSortAccessorsFieldNameByAlphaFilter());
        $this->addFilter($this->getSortNameByAlphaFilter());
        $this->addFilter($this->getSortIdFirstFilter());
        $this->addFilter($this->ucFirst());

        $this->addFunction($this->lineBreak());
        $this->addFunction($this->printValue());
        $this->addFunction($this->printReturnType());
    }

    private function getSortAccessorsFieldNameByAlphaFilter()
    {
        return new TwigFilter(
            'sortAccessorsFieldNameByAlpha',
            function (array $classFields) {
                $arrayFields = $classFields;
                usort(
                    $arrayFields,
                    $this->getSortFieldNameClosure()
                );

                return $arrayFields;
            }
        );
    }

    private function getSortFieldNameClosure()
    {
        return static fn (MethodObject $a, MethodObject $b) => strcmp($a->getAccessorName(), $b->getAccessorName());
    }

    private function getSortNameByAlphaFilter()
    {
        return new TwigFilter(
            'sortNameByAlpha',
            function (array $classFields) {
                $arrayFields = $classFields;
                usort(
                    $arrayFields,
                    $this->getSortNameClosure($arrayFields)
                );

                return $arrayFields;
            }
        );
    }

    private function getSortNameClosure(array $arrayFields)
    {
        if (array_shift($arrayFields) instanceof FieldObject) {
            return static fn (FieldObject $a, FieldObject $b) => strcmp($a->getName(), $b->getName());
        }
        if (array_shift($arrayFields) instanceof ConstObject) {
            return static fn (ConstObject $a, ConstObject $b) => strcmp($a->getName(), $b->getName());
        }

        return static fn (MethodObject $a, MethodObject $b) => strcmp($a->getName(), $b->getName());
    }

    private function getSortIdFirstFilter()
    {
        return new TwigFilter(
            'sortIdFirst',
            function (array $classFields) {
                $arrayFields = $classFields;
                foreach ($arrayFields as $key => $field) {
                    /** @var FieldObject $field */
                    if ('id' === $field->getName()) {
                        unset($arrayFields[$key]);
                        array_unshift($arrayFields, $field);
                    }
                }

                return $arrayFields;
            }
        );
    }

    private function ucFirst()
    {
        return new TwigFilter(
            'ucFirst',
            fn ($value) => ucfirst($value)
        );
    }

    private function lineBreak()
    {
        return new TwigFunction(
            'lineBreak',
            function (array $fields, int $key) {
                $objects = 0;
                foreach ($fields as $field) {
                    if ($field->isObject()) {
                        $objects++;
                    }
                }

                return $key < (count($fields) - 1) - $objects;
            }
        );
    }

    private function printValue()
    {
        return new TwigFunction(
            'printValue',
            function ($value) {
                switch ($value) {
                    case is_bool($value):
                        return $value ? 'true' : 'false';
                    case is_array($value):
                        return "['" . implode('\', \'', $value) . "']";
                    case (bool) preg_match("/\d{4}\-\d{2}-\d{2}/", (string) $value):
                        return '\'' . $value . '\'';
                    default:
                        return $value;
                }
            }
        );
    }

    private function printReturnType()
    {
        return new TwigFunction(
            'printReturnType',
            function ($value, $isNullable) {
                $returnType = $value;
                if (in_array($value, ['DateTime', 'DateTimeImmutable', 'DateTimeInterface'])) {
                    $returnType = '\\' . $value;
                }

                return $isNullable ? '?' . $returnType : $returnType;
            }
        );
    }

    public function render($name, array $context = []): string
    {
        return parent::render($name, $context);
    }
}
