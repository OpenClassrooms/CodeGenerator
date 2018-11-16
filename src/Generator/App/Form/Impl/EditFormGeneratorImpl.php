<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\App\Form\Impl;

use OpenClassrooms\CodeGenerator\Generator\App\Form\OldAbstractFormGenerator;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class EditFormGeneratorImpl extends OldAbstractFormGenerator
{
    public function generate(string $className, array $parameters = []): array
    {
        $formType = $this->formClassObjectService->getEditFormType($className);
        /** @var \OpenClassrooms\CodeGenerator\OldClassObjects\ClassObject $editModel */
        [$abstractModel, $editModel] = $this->formClassObjectService->getEditModelTypes($className);
        $controller = $this->controllerClassObjectService->getShowController($className);
        $fields = $this->getFields($className);
        foreach ($fields as $key => $field) {
            if ($field === 'id') {
                unset($fields[$key]);
            }
        }

        $content = $this->render(
            '/App/Form/EditFormType.php.twig',
            [
                'formTypeNamespace'      => $formType->getNamespace(),
                'formTypeShortClassName' => $formType->getShortClassName(),
                'modelClassName'         => $editModel->getClassName(),
                'modelShortClassName'    => $editModel->getShortClassName(),
                'editRoute'              => $controller->getRouteName(),
                'fields'                 => $fields,
            ]
        );

        return [$formType->getClassName() => $content];
    }

    /**
     * @return array|\OpenClassrooms\CodeGenerator\FileObjects\FieldObject[]
     */
    private function getFields(string $className)
    {
        $fields = $this->fieldObjectService->getPublicClassFields($className);
        foreach ($fields as $key => $field) {
            if ($field->getName() === 'id') {
                unset($fields[$key]);
                break;
            }
        }

        return $fields;
    }
}
