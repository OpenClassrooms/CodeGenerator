<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating;

use OpenClassrooms\CodeGenerator\Services\Templating;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class TemplatingMock extends \Twig_Environment implements Templating
{
    const ACCESSOR_FILTER = 'Accessor';

    const CONST_FILTER = 'Const';

    const FILTER_PREFIX = 'sort';

    const FILTER_SUFFIX = 'ByAlpha';

    const ID_FILTER = self::FILTER_PREFIX . 'ByIdFirst';

    const NAME_FILTER = 'Name';

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
        $this->addGlobal('author', 'authorStub');
        $this->addGlobal('authorEmail', 'author.stub@example.com');

        $this->addFilter($this->getFieldFilter(self::NAME_FILTER));
        $this->addFilter($this->getFieldFilter(self::ACCESSOR_FILTER));
        $this->addFilter($this->getFieldFilter(self::CONST_FILTER));
        $this->addFilter($this->getFilterSortIdFirst());

        $this->addFunction($this->printValue());
    }

    private function getFieldFilter($name)
    {
        return new \Twig_Filter(
            self::FILTER_PREFIX . $name . self::FILTER_SUFFIX,
            function($classFields) use ($name) {
                $arrayFields = $classFields;
                usort(
                    $arrayFields,
                    function($a, $b) use ($name) {
                        $name = 'get' . $name;
                        $al = strtolower($a->$name());
                        $bl = strtolower($b->$name());
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

    private function getFilterSortIdFirst()
    {
        return new \Twig_Filter(
            self::ID_FILTER,
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
