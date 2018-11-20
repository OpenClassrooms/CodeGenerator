<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating;

use OpenClassrooms\CodeGenerator\FileObjects\FieldObject;
use OpenClassrooms\CodeGenerator\Services\Templating;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class TemplatingMock extends \Twig_Environment implements Templating
{
    const ACCESSOR_FILTER = 'Accessor';

    const CONST_FILTER = 'Const';

    const FILTER_PREFIX = 'sortBy';

    const ID_FILTER = self::FILTER_PREFIX . 'IdFirst';

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
    }

    private function getFieldFilter($name)
    {
        return new \Twig_Filter(
            self::FILTER_PREFIX . $name,
            function($classFields) use ($name) {
                $arrayFields = $classFields;
                usort(
                    $arrayFields,
                    function(FieldObject $a, FieldObject $b) use ($name) {
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
}
