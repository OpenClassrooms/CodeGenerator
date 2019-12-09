<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Commands;

use OpenClassrooms\CodeGenerator\Mediators\Args;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;

trait CheckCommandArgumentTrait
{
    protected function checkConfiguration(array $codeGeneratorConfig): void
    {
        $emptyParameters = [];
        foreach ($codeGeneratorConfig['parameters'] as $parameter => $value) {
            if (null === $value) {
                $emptyParameters[] = $parameter;
            }
        }
        if (!empty($emptyParameters) && count($emptyParameters) === 1) {
            throw new \ErrorException(
                'The parameter ' . array_shift($emptyParameters) . ' are empty in oc_code_generator.yml'
            );
        } elseif (!empty($emptyParameters)) {
            throw new \ErrorException(
                'The parameters ' . implode(', ', $emptyParameters) . ' are empty in oc_code_generator.yml'
            );
        }
    }

    protected function checkInputClassNameArgument(InputInterface $input, OutputInterface $output): void
    {
        if (null === $input->getArgument(Args::CLASS_NAME)) {
            $helper = $this->getHelper('question');
            $classNameQuestion = new Question(
                'Please enter class name (ex: BaseNamespace\Domain\Subdomain\ShortClassName): ',
                'DefaultClassName'
            );
            $className = $helper->ask($input, $output, $classNameQuestion);

            if ($this->isValidClassName($className)) {
                $input->setArgument(Args::CLASS_NAME, $className);
            }
        }
    }

    /**
     * @throws \ErrorException
     */
    private function isValidClassName(string $className): bool
    {
        if (class_exists($className)) {
            return true;
        }

        throw new \ErrorException("Class $className doesn't exist");
    }

    protected function checkInputDomainAndNameArgument(
        InputInterface $input,
        OutputInterface $output,
        string $name
    ): void {
        if (null === $input->getArgument(Args::DOMAIN) || null === $input->getArgument($name)) {
            $helper = $this->getHelper('question');
            $domainQuestion = new Question('Please enter domain folders (ex: Domain\Subdomain): ', 'Domain\Subdomain');
            $useCaseQuestion = new Question('Please enter the class short name of the ' . $name . ': ', 'DefaultName');

            $input->setArgument(Args::DOMAIN, $helper->ask($input, $output, $domainQuestion));
            $input->setArgument($name, $helper->ask($input, $output, $useCaseQuestion));
        }
    }
}
