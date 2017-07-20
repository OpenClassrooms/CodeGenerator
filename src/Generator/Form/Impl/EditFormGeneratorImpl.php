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
        $formType = $this->classObjectService->getEditFormType($useCaseRequestClass);
        /** @var \OpenClassrooms\CodeGenerator\ClassObjects\ClassObject $editModel */
        list($abstractModel, $editModel) = $this->classObjectService->getEditModelTypes($useCaseRequestClass);
        $controller = $this->classObjectService->getController($useCaseRequestClass);
        $fields = $this->getFields($useCaseRequestClass);
        foreach ($fields as $key => $field) {
            if ($field === 'id') {
                unset($fields[$key]);
            }
        }

        return $this->render(
            'Form/EditFormType.php.twig',
            [
                'formTypeNamespace' => $formType->getNamespace(),
                'formTypeShortClassName' => $formType->getShortClassName(),
                'modelClassName' => $editModel->getClassName(),
                'modelShortClassName' => $editModel->getShortClassName(),
                'editRoute' => $controller->getRouteName(),
                'fields' => $fields
            ]
        );
    }

    /**
     * @return array|\OpenClassrooms\CodeGenerator\ClassObjects\FieldObject[]
     */
    private function getFields(string $useCaseRequestClass)
    {
        $fields = $this->fieldObjectService->getPublicClassFields($useCaseRequestClass);
        foreach ($fields as $key => $field) {
            if ($field->getName() === 'id'){
                unset($fields[$key]);
                break;
            }
        }

        return $fields;
    }
}
