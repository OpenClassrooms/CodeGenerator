<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Commands;

use OpenClassrooms\CodeGenerator\Mediators\Args;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\Yaml\Yaml;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class GenericUseCaseCommand extends AbstractCommand
{
    /**
     * @var string
     */
    protected static $defaultName = 'code-generator:generic-use-case';

    public function __construct($name = null)
    {
        parent::__construct($name);
        $this->container = new ContainerBuilder();
        $loader = new XmlFileLoader($this->container, new FileLocator(self::CONFIG_DIR));
        $loader->load('generic_use_case_services.xml');
        $this->loadConfigParameters();
        $this->container->compile();
    }

    protected function configure()
    {
        $this
            ->setName(self::$defaultName)
            ->setDescription('Create view model architecture')
            ->setHelp('This command allows you to create view model architecture')
            ->addArgument(Args::DOMAIN, InputArgument::REQUIRED, 'set Domain/SubDomain')
            ->addArgument(Args::USE_CASE, InputArgument::REQUIRED, 'set UseCase name');
        $this->configureOptions();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $codeGeneratorConfig = Yaml::parseFile(static::ROOT_DIR . '/' . static::CONFIG_FILE);

        $this->checkConfiguration($codeGeneratorConfig);

        if (empty($args[Args::DOMAIN]) || empty($args[Args::USE_CASE])) {
            $helper = $this->getHelper('question');
            $useCaseQuestion = new Question('Please enter the name of the useCase', 'UseCase');
            $domainQuestion = new Question('Please enter domain folders', 'Domain\Subdomain');

            $args[Args::USE_CASE] = $helper->ask($input, $output, $useCaseQuestion);
            $args[Args::DOMAIN] = $helper->ask($input, $output, $domainQuestion);

        }

        $fileObjects = $this->container
            ->get('open_classrooms.code_generator.mediators.business_rules.impl.use_case_mediator_impl')
            ->mediate($input->getArguments(), $input->getOptions());

        $io = new SymfonyStyle($input, $output);

        [$writtenFiles, $notWrittenFiles] = $this->getFilesWritingStatus($fileObjects);

        $this->displayCreatedFilePath($io, $writtenFiles);
        $this->displayNotWrittenFilePathAndContent($io, $notWrittenFiles, $input);
        $this->displayFilePathAndContentDump($io, array_merge($writtenFiles, $notWrittenFiles), $input);

    }
}
