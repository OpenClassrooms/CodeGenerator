<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Services\Impl;

use OpenClassrooms\CodeGenerator\Services\TemplatingService;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class TemplatingServiceImpl extends \Twig_Environment
{
    public function __construct()
    {
        parent::__construct(
            new \Twig_Loader_Filesystem(__DIR__ . '/../../../../src/Skeleton'),
            [
                'debug'            => true,
                'cache'            => false,
                'strict_variables' => true,
                'autoescape'       => false,
            ]
        );
        $this->addGlobal('author', $config['author']);
        $this->addGlobal('authorEmail', $config['authorEmail']);

        $this->addFilter($this->getSortNameByAlphaFilter());
        $this->addFilter($this->getSortIdFirstFilter());

        $this->addFunction($this->printValue());

        return $templating;
    }

    private function getSortNameByAlphaFilter()
    {
        return new \Twig_Filter(
            'sortNameByAlpha',
            function($classFields) {
                $arrayFields = $classFields;
                usort(
                    $arrayFields,
                    function($a, $b) {
                        $al = strtolower($a->getName());
                        $bl = strtolower($b->getName());
                        if ($al == $bl) {
                            return 0;
                        }

                        return ($al > $bl) ? +1 : -1;
                    }
                );

                return $arrayFields;
            }
        );
    }

    private function getSortIdFirstFilter()
    {
        return new \Twig_Filter(
            'sortNameByAlpha',
            function($classFields) {
                $arrayFields = $classFields;
                foreach ($arrayFields as $key => $field) {
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
        return new \Twig_Function(
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
