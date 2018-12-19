<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Services\Impl;

use OpenClassrooms\CodeGenerator\Services\TemplatingFactory;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class TemplatingFactoryImpl implements TemplatingFactory
{
    public function create(array $config): \Twig_Environment
    {
        $templating = new \Twig_Environment(
            new \Twig_Loader_Filesystem(__DIR__ . '/../../Skeleton'),
            [
                'debug'            => true,
                'cache'            => false,
                'strict_variables' => true,
                'autoescape'       => false,
            ]
        );
        $templating->addGlobal('author', $config['author']);
        $templating->addGlobal('authorEmail', $config['authorEmail']);

        return $templating;
    }
}
