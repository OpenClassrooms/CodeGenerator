<?php

namespace OpenClassrooms\CodeGenerator\Utility;

use OpenClassrooms\CodeGenerator\ClassObjects\ClassObject;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class NamespaceConverter
{
    /**
     * @var string
     */
    private static $appNamespace = 'OpenClassrooms\CodeGenerator\Tests\Doubles\src\App';

    private static $baseNamespace = 'OpenClassrooms\CodeGenerator\Tests\Doubles\src';

    public static function getInterfaceClassObjectFromClassName(string $className): ClassObject
    {
        $rc = new \ReflectionClass($className);
        $in = $rc->getInterfaceNames()[0];
        $rc = new \ReflectionClass($in);

        return new ClassObject($rc->getNamespaceName(), $rc->getShortName(), true);
    }

    public static function getControllerClassObjectFromClassName(string $className, bool $admin = false): ClassObject
    {
        list($domain, $entityName) = self::getDomainAndEntityNameFromClassName($className);

        $controllerNamespace = self::$appNamespace.'\\Controller\\Web\\'.$domain;
        if ($admin) {
            $controllerNamespace .= 'Admin';
        }

        $shortClassName = 'Get'.$entityName.'Controller';

        return new ClassObject($controllerNamespace, $shortClassName);
    }

    public static function getDomainAndEntityNameFromClassName(string $className): array
    {
        return [self::getDomainFromClassName($className), self::getEntityNameFromClassName($className)];
    }

    public static function getDomainFromClassName(string $className): string
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

    public static function getEntityNameFromClassName(string $className): string
    {
        $shortClassName = self::getShortClassNameFromClassName($className);
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

    public static function getShortClassNameFromClassName(string $className): string
    {
        $rc = new \ReflectionClass($className);

        return $rc->getShortName();
    }

    /**
     * @return [ClassObject, ClassObject]|array
     */
    public static function getViewModelAssemblerClassObjectsFromClassName(string $className): array
    {
        list($domain, $entityName) = self::getDomainAndEntityNameFromClassName($className);

        return [
            new ClassObject(
                self::$appNamespace.'\\ViewModels\\Web\\'.$domain,
                $entityName.'Assembler',
                true
            ),
            new ClassObject(
                self::$appNamespace.'\\ViewModels\\Web\\'.$domain.'\\Impl',
                $entityName.'AssemblerImpl'
            )
        ];
    }

    /**
     * @return [ClassObject, ClassObject]|array
     */
    public static function getViewModelClassObjectsFromClassName(string $className): array
    {
        list($domain, $entityName) = self::getDomainAndEntityNameFromClassName($className);

        return [
            new ClassObject(
                self::$appNamespace.'\\ViewModels\\Web\\'.$domain,
                $entityName.'Detail'
            ),
            new ClassObject(
                self::$appNamespace.'\\ViewModels\\Web\\'.$domain.'\\Impl',
                $entityName.'DetailImpl'
            )
        ];
    }

    public static function getEntityNotFoundExceptionClassObjectsFromClassName(string $className): ClassObject
    {
        list($domain, $entityName) = self::getDomainAndEntityNameFromClassName($className);

        return new ClassObject(
            self::$baseNamespace.'\\BusinessRules\\Gateways\\'.$domain, $entityName.'NotFoundException'
        );
    }

    public static function getGetUseCaseClassObjectFromClassName(string $className): ClassObject
    {
        list($domain, $entityName) = self::getDomainAndEntityNameFromClassName($className);

        return new ClassObject(self::$baseNamespace.'\\BusinessRules\\UseCases\\'.$domain, 'Get'.$entityName);
    }

    public static function getGetUseCaseRequestBuilderClassObjectFromClassName(string $className): ClassObject
    {
        list($domain, $entityName) = self::getDomainAndEntityNameFromClassName($className);

        return new ClassObject(self::$baseNamespace.'\\BusinessRules\\Requestors\\'.$domain, 'Get'.$entityName .'RequestBuilder');
    }

    public static function setAppNamespace(string $appNamespace)
    {
        self::$appNamespace = $appNamespace;
    }
}
