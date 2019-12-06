<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Utility;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class FileObjectUtility
{
    public static function getBaseNamespaceDomainAndEntityNameFromClassName(string $className): array
    {
        return [
            self::getBaseNamespaceFromClassName($className),
            self::getDomainFromClassName($className),
            self::getEntityNameFromClassName($className),
        ];
    }

    public static function getBaseNamespaceFromClassName(string $className): ?string
    {
        $explodedNamespace = explode('\\', self::getNamespace($className));
        $dirs = [];
        foreach ($explodedNamespace as $dirName) {
            if (in_array($dirName, ['BusinessRules', 'Entity', 'Api', 'ApiBundle', 'App', 'AppBundle'])) {
                break;
            }
            $dirs[] = $dirName;
        }

        if (!empty($dirs)) {
            return implode('\\', $dirs) . '\\';
        }

        return null;
    }

    public static function getDomainFromClassName(string $className): string
    {
        $explodedNamespace = explode('\\', self::getNamespace($className));

        $domain = [];

        $limit = self::getNamespaceLimit($explodedNamespace);

        for ($i = count($explodedNamespace) - 1; $i > 0 && $i != $limit; $i--) {
            if (array_search(
                $explodedNamespace[$i],
                ['Entities', 'Request', 'Response', 'DTO', 'UseCases', 'Impl', 'Gateways']
                ) === false) {
                $domain[] = $explodedNamespace[$i];
            }
        }

        return implode('\\', array_reverse($domain));
    }

    public static function getEntityNameFromClassName(string $className): string
    {
        $shortClassName = self::getShortClassName($className);

        $classTypes = [
            'Assembler',
            'Builder',
            'Create',
            'CommonFieldTrait',
            'Delete',
            'Detail',
            'Edit',
            'Gateway',
            'Impl',
            'ListItem',
            'ResponseDTO',
            'Response',
            'RequestDTO',
            'Request',
            'Stub1',
            'TestCase',
            'ViewModel',
        ];

        foreach ($classTypes as $type) {
            if (false !== strpos($shortClassName, $type)) {
                $shortClassName = str_replace($type, '', $shortClassName);
            }
        }

        return $shortClassName;
    }

    public static function getNamespace(string $className)
    {
        $classParts = explode('\\', $className);
        array_pop($classParts);

        return implode('\\', $classParts);
    }

    private static function getNamespaceLimit(array $explodedNamespace): int
    {
        $excludeDir = ['BusinessRules', 'Entity', 'ViewModels', 'Responders', 'Requestors'];
        foreach (array_reverse($explodedNamespace) as $key => $dir) {
            if (in_array($dir, $excludeDir)) {
                return count($explodedNamespace) - 1 - $key;
            }
        }

        return 0;
    }

    public static function getShortClassName(string $className): string
    {
        $classParts = explode('\\', $className);

        return array_pop($classParts);
    }
}
