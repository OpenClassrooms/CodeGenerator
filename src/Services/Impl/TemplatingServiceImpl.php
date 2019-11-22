<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Services\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\ConstObject;
use OpenClassrooms\CodeGenerator\Entities\Object\FieldObject;
use OpenClassrooms\CodeGenerator\Entities\Object\MethodObject;
use OpenClassrooms\CodeGenerator\Services\TemplatingService;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\TwigFilter;
use Twig\TwigFunction;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class TemplatingServiceImpl extends Environment implements TemplatingService
{
    /**
     * @var string
     */
    protected $skeletonDir;

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
        $this->addFilter($this->getSortNameByAlphaFilter());
        $this->addFilter($this->getSortIdFirstFilter());

        $this->addFunction($this->lineBreak());
        $this->addFunction($this->printValue());
        $this->addFunction($this->printReturnType());
    }

    private function getSortIdFirstFilter()
    {
        return new TwigFilter(
            'sortIdFirst',
            function(array $classFields) {
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

    private function getSortNameByAlphaFilter()
    {
        return new TwigFilter(
            'sortNameByAlpha',
            function(array $classFields) {
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
            return function(FieldObject $a, FieldObject $b) {
                $al = strtolower($a->getName());
                $bl = strtolower($b->getName());

                return ($al > $bl) ? +1 : -1;
            };
        }
        if (array_shift($arrayFields) instanceof ConstObject) {
            return function(ConstObject $a, ConstObject $b) {
                $al = strtolower($a->getName());
                $bl = strtolower($b->getName());

                return ($al > $bl) ? +1 : -1;
            };
        }

        return function(MethodObject $a, MethodObject $b) {
            $al = strtolower($a->getName());
            $bl = strtolower($b->getName());

            return ($al > $bl) ? +1 : -1;
        };
    }

    private function lineBreak()
    {
        return new TwigFunction(
            'lineBreak',
            function(array $fields, int $key) {
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

    private function printReturnType()
    {
        return new TwigFunction(
            'printReturnType',
            function($value, $isNullable) {
                $returnType = $value;
                if (in_array($value, ['DateTime', 'DateTimeImmutable', 'DateTimeInterface'])) {
                    $returnType = '\\' . $value;
                }

                return $isNullable ? '?' . $returnType : $returnType;
            }
        );
    }

    private function printValue()
    {
        return new TwigFunction(
            'printValue',
            function($value) {
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

    public function render($name, array $context = []): string
    {
        return parent::render($name, $context);
    }
}
