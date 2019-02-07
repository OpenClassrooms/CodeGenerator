<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Services\Impl;

use OpenClassrooms\CodeGenerator\FileObjects\ConstObject;
use OpenClassrooms\CodeGenerator\FileObjects\FieldObject;
use OpenClassrooms\CodeGenerator\Services\TemplatingService;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class TemplatingServiceImpl extends \Twig_Environment implements TemplatingService
{
    /**
     * @var string
     */
    protected $skeletonDir;

    public function __construct(string $skeletonDir, string $author, string $authorMail)
    {
        $this->skeletonDir = $skeletonDir;

        parent::__construct(
            new \Twig_Loader_Filesystem(__DIR__ . $this->skeletonDir),
            [
                'debug'            => true,
                'cache'            => false,
                'strict_variables' => true,
                'autoescape'       => false,
            ]
        );
        $this->addGlobal('author', $author);
        $this->addGlobal('authorEmail', $authorMail);

        $this->addFilter($this->getSortNameByAlphaFilter());
        $this->addFilter($this->getSortIdFirstFilter());

        $this->addFunction($this->printValue());
    }

    private function getSortNameByAlphaFilter()
    {
        return new \Twig_SimpleFilter(
            'sortNameByAlpha',
            function(array $classFields) {
                $arrayFields = $classFields;
                usort(
                    $arrayFields,
                    function(FieldObject $a, FieldObject $b) {
                        $al = strtolower($a->getName());
                        $bl = strtolower($b->getName());

                        return ($al > $bl) ? +1 : -1;
                    }
                );

                return $arrayFields;
            }
        );
    }

    private function getSortIdFirstFilter()
    {
        return new \Twig_SimpleFilter(
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

    private function printValue()
    {
        return new \Twig_SimpleFunction(
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
}
