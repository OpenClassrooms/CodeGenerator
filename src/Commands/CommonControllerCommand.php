<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Commands;

use OpenClassrooms\CodeGenerator\Exceptions\BadCommandArgumentException;
use OpenClassrooms\CodeGenerator\Mediators\Api\Controller\CommonControllerMediator;
use OpenClassrooms\CodeGenerator\Mediators\Args;
use OpenClassrooms\CodeGenerator\Mediators\ClassType;
use OpenClassrooms\CodeGenerator\Mediators\Options;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

class CommonControllerCommand extends AbstractCommand
{
    /**
     * @var string
     */
    protected static $defaultName = 'code-generator:common-controller';

    public function __construct($name = null)
    {
        parent::__construct($name);
        $this->container = new ContainerBuilder();
        $loader = new XmlFileLoader($this->container, new FileLocator(self::CONFIG_DIR));
        $loader->load('common_controller_services.xml');
        $this->loadConfigParameters();
        $this->container->compile();
    }

    protected function configure()
    {
        $this
            ->setName(self::$defaultName)
            ->setDescription('Generate controller and model')
            ->setHelp('This command allows you to generate controller and model if needed')
            ->addArgument(Args::CLASS_NAME, InputArgument::OPTIONAL, 'set entity class name')
            ->addArgument(
                Args::TYPE,
                InputArgument::OPTIONAL,
                'set type of class to generate (delete, get, get-all, patch, post)'
            )
            ->addOption(
                Options::DUMP,
                null,
                InputOption::VALUE_NONE,
                'Dump'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $codeGeneratorConfig = $this->parseConfigFile();
        $this->checkConfiguration($codeGeneratorConfig);
        $this->checkInputClassNameArgument($input, $output);
        $this->checkInputTypeArgument($input, $output);

        $fileObjects = $this->container
            ->get(CommonControllerMediator::class)
            ->mediate($input->getArguments(), $input->getOptions());

        $this->commandDisplay($input, $output, $fileObjects);
    }

    private function checkInputTypeArgument(InputInterface $input, OutputInterface $output): void
    {
        if (null === $input->getArgument(Args::TYPE)) {
            $helper = $this->getHelper('question');
            $typeQuestion = new Question(
                'Please enter type of class to generate (delete, get, get-all, patch, post) : '
            );
            $type = $helper->ask($input, $output, $typeQuestion);

            if ($this->isValidType($type)) {
                $input->setArgument(Args::TYPE, $type);
            }
        }
    }

    /**
     * @throws BadCommandArgumentException
     */
    private function isValidType(string $type): bool
    {
        if (in_array(
            $type,
            [ClassType::DELETE, ClassType::GET, ClassType::GET_ALL, ClassType::PATCH, ClassType::POST]
        )) {
            return true;
        }

        throw new BadCommandArgumentException("Type $type doesn't exist");
    }
}
