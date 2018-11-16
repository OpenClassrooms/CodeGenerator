<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Services\Impl;

use Doctrine\Common\Inflector\Inflector;
use OpenClassrooms\CodeGenerator\OldClassObjects\ClassObject;
use OpenClassrooms\CodeGenerator\Services\ControllerClassObjectService;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class ControllerClassObjectServiceImpl extends ClassObjectServiceImpl implements ControllerClassObjectService
{
    public function getListController(string $className, bool $admin = false): ClassObject
    {
        [$domain, $entityName] = $this->getDomainAndEntityNameFromClassName($className);

        $controllerNamespace = $this->appNamespace . '\\Controller\\Web\\' . $domain;
        if ($admin) {
            $controllerNamespace .= '\\Admin';
        }

        $shortClassName = 'List' . Inflector::pluralize($entityName) . 'Controller';

        return new ClassObject($controllerNamespace, $shortClassName);
    }

    public function getShowController(string $className, bool $admin = false): ClassObject
    {
        [$domain, $entityName] = $this->getDomainAndEntityNameFromClassName($className);

        $controllerNamespace = $this->appNamespace . '\\Controller\\Web\\' . $domain;
        if ($admin) {
            $controllerNamespace .= '\\Admin';
        }

        $shortClassName = 'Show' . $entityName . 'Controller';

        return new ClassObject($controllerNamespace, $shortClassName);
    }
}
