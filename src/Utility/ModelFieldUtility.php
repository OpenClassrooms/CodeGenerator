<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Utility;

use OpenClassrooms\CodeGenerator\Entities\Object\FieldObject;

class ModelFieldUtility
{
    /**
     * @return FieldObject[]
     */
    public static function generateModelFieldObjects(string $className): array
    {
        $rc = new \ReflectionClass($className);
        /** @var \ReflectionProperty[] $reflectionProperties */
        $reflectionProperties = $rc->getProperties(\ReflectionProperty::IS_PROTECTED);
        $modelFieldObjects = [];
        foreach ($reflectionProperties as $field) {
            if ($field->getDeclaringClass()->getName() === $className && FieldUtility::isUpdatable($field->getName())) {
                $modelFieldObjects[] = self::buildModelField($field);
            }
        }

        return $modelFieldObjects;
    }

    private static function buildModelField(\ReflectionProperty $field): FieldObject
    {
        $fieldTypeName = $field->getType() ? $field->getType()->getName() : null;
        $fieldObject = new FieldObject($field->getName(), $fieldTypeName);
        $fieldType = $field->getDocComment() ?: $fieldTypeName;
        $fieldObject->setDocComment(self::buildAssertDocComment($fieldType));

        return $fieldObject;
    }

    private static function buildAssertDocComment(string $docComment): ?string
    {
        switch (DocCommentUtility::getType($docComment)) {
            case 'int':
                return "/**
     * @Assert\NotBlank
     * @Assert\Type(\"integer\")
     */";
            case 'string':
                return "/**
     * @Assert\NotBlank
     * @Assert\Type(\"string\")
     */";
            case 'bool':
                return "/**
     * @Assert\NotNull
     * @Assert\Type(\"bool\")
     */";
            case 'array':
                return "/**
     * @var " . DocCommentUtility::getInternalTypeNameFromDocComment($docComment) . "[]
     *
     * @Assert\Type(\"array\")
     */";
            case in_array(
                DocCommentUtility::getType($docComment),
                ['\DateTime', '\DateTimeImmutable', '\DateTimeInterface']
            ):
                return "/**
     * @Assert\NotBlank
     * @Assert\DateTime(format=\"Y-m-d\TH:i:sO\")
     */";
            default:
                return "/**
     * @var " . DocCommentUtility::getType($docComment) . "
     */";
        }
    }
}
