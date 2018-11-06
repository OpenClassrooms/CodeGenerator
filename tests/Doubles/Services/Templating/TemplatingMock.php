<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating;

use OpenClassrooms\CodeGenerator\Services\Templating;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class TemplatingMock extends \Twig_Environment implements Templating
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
        $this->addGlobal('author', 'authorStub');
        $this->addGlobal('authorEmail', 'author.stub@example.com');
    }
}
