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
        $shortClassName = str_replace('Assembler', '', $shortClassName);
        $shortClassName = str_replace('Builder', '', $shortClassName);
        $shortClassName = str_replace('Create', '', $shortClassName);
        $shortClassName = str_replace('CommonFieldTrait', '', $shortClassName);
        $shortClassName = str_replace('Detail', '', $shortClassName);
        $shortClassName = str_replace('Edit', '', $shortClassName);
        $shortClassName = str_replace('Gateway', '', $shortClassName);
        $shortClassName = str_replace('Impl', '', $shortClassName);
        $shortClassName = str_replace('ListItem', '', $shortClassName);
        $shortClassName = str_replace('ResponseDTO', '', $shortClassName);
        $shortClassName = str_replace('Response', '', $shortClassName);
        $shortClassName = str_replace('RequestDTO', '', $shortClassName);
        $shortClassName = str_replace('Request', '', $shortClassName);
        $shortClassName = str_replace('Stub1', '', $shortClassName);
        $shortClassName = str_replace('TestCase', '', $shortClassName);
        $shortClassName = str_replace('ViewModel', '', $shortClassName);

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
