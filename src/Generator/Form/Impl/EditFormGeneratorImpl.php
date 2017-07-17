<?php

namespace OpenClassrooms\CodeGenerator\Generator\Form\Impl;

use OpenClassrooms\CodeGenerator\Generator\Generator;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class EditFormGeneratorImpl extends Generator
{
    public function generate(string $useCaseRequestClass): string
    {
        $fields = $this->getPublicFieldsFromClass($useCaseRequestClass);
        foreach ($fields as $key => $field) {
            if ($field === 'id') {
                unset($fields[$key]);
            }
        }

        return $this->render(
            'Form/EditFormType.php.twig',
            [
                'author' => 'Romain Kuzniak',
                'authorEmail' => 'romain.kuzniak@openclassrooms.com',
                'namespace' => $this->getFormNamespace($useCaseRequestClass),
                'modelNamespace' => $this->getModelNamespace($useCaseRequestClass),
                'typeName' => $this->getTypeName($useCaseRequestClass),
                'editRoute' => '',
                'modelName' => $this->getModelNameFromRequestClass($useCaseRequestClass),
                'fields' => $fields
            ]
        );
    }

    protected function getFormNamespace(string $useCaseRequestClass, $forAdmin = false): string
    {
        return $this->rootNamespace.'\Form\Type';
    }

    protected function getModelNamespace(string $useCaseRequestClass): string
    {
        return $this->rootNamespace.'\Form\Model\\'.$this->getModelNameFromRequestClass($useCaseRequestClass);
    }

    protected function getModelNameFromRequestClass(string $useCaseRequestClass): string
    {
        return $this->getEntityNameFromRequestClass($useCaseRequestClass).'Model';
    }

    protected function getEntityNameFromRequestClass(string $useCaseRequestClass): string
    {
        $entityName = str_replace('Edit', '', $useCaseRequestClass);
        $entityName = str_replace('RequestDTO', '', $useCaseRequestClass);

        return $entityName;
    }

    protected function getTypeName(string $useCaseRequestClass)
    {
        return 'Edit'.$this->getModelNameFromRequestClass($useCaseRequestClass).'Type';
    }
}
