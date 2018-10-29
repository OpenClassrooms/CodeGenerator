<?php

namespace OpenClassrooms\CodeGenerator\FileObjects\Impl;


use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\FileObjects\FileObjectFactory;
use OpenClassrooms\CodeGenerator\Utility\ClassNameUtility;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class FileObjectFactoryImpl implements FileObjectFactory
{
    use ClassNameUtility;

    public function create(string $type, string $className): FileObject
    {
        $fileObject = new FileObject();

        list($domain, $entity) = $this->getDomainAndEntityNameFromClassName($className);

        //TODO use baseNamespace instead of ViewModels
        $fileObject->setClassName('ViewModels\\'.$domain.'\\'. $entity);

        return $fileObject;
    }


}
