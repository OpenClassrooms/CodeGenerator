<?php

namespace OpenClassrooms\CodeGenerator\Utility;

use OpenClassrooms\CodeGenerator\ClassObjects\ClassObject;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
trait ClassNameUtility
{
    public function getInterfaceClassObjectFromClassName(string $className): ClassObject
    {
        $rc = new \ReflectionClass($className);
        $in = $rc->getInterfaceNames()[0];
        $rc = new \ReflectionClass($in);

        return new ClassObject($rc->getNamespaceName(), $rc->getShortName(), true);
    }

    protected function getDomainAndEntityNameFromClassName(string $className): array
    {
        return [$this->getDomainFromClassName($className), $this->getEntityNameFromClassName($className)];
    }

    protected function getDomainFromClassName(string $className): string
    {
        $rc = new \ReflectionClass($className);
        $explodedNamespace = explode('\\', $rc->getNamespaceName());
        $domain = [];
        for ($i = count($explodedNamespace) - 1; $i <= 0 || $explodedNamespace[$i] !== 'BusinessRules'; $i--) {
            if (array_search($explodedNamespace[$i], ['Request', 'Response', 'DTO', 'UseCases']) === false) {
                $domain[] = $explodedNamespace[$i];
            }
        }

        return implode('\\', array_reverse($domain));
    }

    public function getEntityNameFromClassName(string $className): string
    {
        $shortClassName = $this->getShortClassNameFromClassName($className);
        $shortClassName = str_replace('DetailResponseDTO', '', $shortClassName);
        $shortClassName = str_replace('DetailResponse', '', $shortClassName);
        $shortClassName = str_replace('ListItemResponseDTO', '', $shortClassName);
        $shortClassName = str_replace('ListItemResponse', '', $shortClassName);
        $shortClassName = str_replace('ResponseDTO', '', $shortClassName);
        $shortClassName = str_replace('Response', '', $shortClassName);
        $shortClassName = str_replace('RequestDTO', '', $shortClassName);
        $shortClassName = str_replace('Request', '', $shortClassName);
        $shortClassName = str_replace('Edit', '', $shortClassName);

        return $shortClassName;
    }

    protected function getShortClassNameFromClassName(string $className): string
    {
        $rc = new \ReflectionClass($className);

        return $rc->getShortName();
    }
}
