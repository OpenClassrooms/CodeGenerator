<?php

namespace OpenClassrooms\CodeGenerator\Services\Impl;

use OpenClassrooms\CodeGenerator\ClassObjects\ClassObject;
use OpenClassrooms\CodeGenerator\Services\FormClassObjectService;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class FormClassObjectServiceImpl extends ClassObjectServiceImpl implements FormClassObjectService
{
    public function getEditFormType(string $className): ClassObject
    {
        list($domain, $entityName) = $this->getDomainAndEntityNameFromClassName($className);

        return new ClassObject($this->appNamespace.'\\Form\\Type\\'.$domain, 'Edit'.$entityName.'Type');
    }

    public function getEditModelTypes(string $className): array
    {
        list($domain, $entityName) = $this->getDomainAndEntityNameFromClassName($className);

        return [
            new ClassObject($this->appNamespace.'\\Form\\Model\\'.$domain, $entityName.'Model', false, true),
            new ClassObject($this->appNamespace.'\\Form\\Model\\'.$domain, 'Edit'.$entityName.'Model')
        ];

    }
}
