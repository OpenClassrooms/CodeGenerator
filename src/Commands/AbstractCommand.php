<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Commands;

use OpenClassrooms\CodeGenerator\Mediators\Options;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class AbstractCommand extends Command
{
    use CommandDisplayTrait;

    const CONFIG_DIR = __DIR__ . '/../Resources/config';

    const CONFIG_FILE = 'oc_code_generator.yml';

    const ROOT_DIR = __DIR__ . '/../../../../..';

    /**
     * @var ContainerBuilder
     */
    protected $container;

    protected function configureOptions()
    {
        $this->addOption(
            Options::NO_TEST,
            null,
            InputOption::VALUE_NONE,
            'Without test'
        )
            ->addOption(
                Options::TESTS_ONLY,
                null,
                InputOption::VALUE_NONE,
                'Only test'
            )
            ->addOption(
                Options::DUMP,
                null,
                InputOption::VALUE_NONE,
                'Dump'
            );
    }

    protected function loadConfigParameters(array $config = null)
    {
        if (empty($config)) {
            $loader = new YamlFileLoader($this->container, new FileLocator(static::ROOT_DIR));
            $loader->load(static::CONFIG_FILE);
        }

    }
}
