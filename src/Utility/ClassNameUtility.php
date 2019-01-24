<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Utility;

use OpenClassrooms\CodeGenerator\OldClassObjects\ClassObject;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
trait ClassNameUtility
{
    protected function getDomainAndEntityNameFromClassName(string $className): array
    {
        return [$this->getDomainFromClassName($className), $this->getEntityNameFromClassName($className)];
    }

    protected function getDomainFromClassName(string $className): string
    {
        $explodedNamespace = explode('\\', $this->getNamespace($className));

        $domain = [];

        for ($i = count($explodedNamespace) - 1; $i > 0 && $this->namespaceLimit($explodedNamespace, $i); $i--) {
            if (array_search(
                    $explodedNamespace[$i],
                    ['Entities', 'Request', 'Response', 'DTO', 'UseCases', 'Impl']
                ) === false) {
                $domain[] = $explodedNamespace[$i];
            }
        }

        return implode('\\', array_reverse($domain));
    }

    public function getEntityNameFromClassName(string $className): string
    {
        $shortClassName = $this->getShortClassNameFromClassName($className);
        $shortClassName = str_replace('DetailAssembler', '', $shortClassName);
        $shortClassName = str_replace('DetailResponseDTO', '', $shortClassName);
        $shortClassName = str_replace('DetailResponse', '', $shortClassName);
        $shortClassName = str_replace('Detail', '', $shortClassName);
        $shortClassName = str_replace('Edit', '', $shortClassName);
        $shortClassName = str_replace('Impl', '', $shortClassName);
        $shortClassName = str_replace('ListItemAssembler', '', $shortClassName);
        $shortClassName = str_replace('ListItemResponseDTO', '', $shortClassName);
        $shortClassName = str_replace('ListItemResponse', '', $shortClassName);
        $shortClassName = str_replace('ListItem', '', $shortClassName);
        $shortClassName = str_replace('ResponseDTO', '', $shortClassName);
        $shortClassName = str_replace('Response', '', $shortClassName);
        $shortClassName = str_replace('RequestDTO', '', $shortClassName);
        $shortClassName = str_replace('Request', '', $shortClassName);
        $shortClassName = str_replace('Stub1', '', $shortClassName);
        $shortClassName = str_replace('TestCase', '', $shortClassName);

        return $shortClassName;
    }

    public function getInterfaceClassObjectFromClassName(string $className): ClassObject
    {
        $rc = new \ReflectionClass($className);
        $interfaceNames = $rc->getInterfaceNames();
        $rc = new \ReflectionClass(end($interfaceNames));

        return new ClassObject($rc->getNamespaceName(), $rc->getShortName(), true);
    }

    private function getNamespace(string $className)
    {
        $classParts = explode('\\', $className);
        array_pop($classParts);

        return implode('\\', $classParts);
    }

    protected function getNamespaceFromClassName(string $className): string
    {
        $rc = new \ReflectionClass($className);

        return $rc->getNamespaceName();
    }

    protected function getShortClassNameFromClassName(string $className): string
    {
        $classParts = explode('\\', $className);

        return array_pop($classParts);
    }

    protected function namespaceLimit(array $explodedNamespace, int $i): bool
    {
        return $explodedNamespace[$i] !== 'BusinessRules'
            && $explodedNamespace[$i] !== 'Entity'
            && $explodedNamespace[$i] !== 'ViewModels'
            && $explodedNamespace[$i] !== 'Responders';
    }
}
