<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Services\Impl;

use Doctrine\Common\Inflector\Inflector;
use OpenClassrooms\CodeGenerator\OldClassObjects\ClassObject;
use OpenClassrooms\CodeGenerator\Services\ViewModelClassObjectService;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class ViewModelClassObjectServiceImpl extends ClassObjectServiceImpl implements ViewModelClassObjectService
{
    /**
     * @inheritdoc
     */
    public function getListViewModelBuilders(string $className): array
    {
        [$domain, $entityName] = $this->getDomainAndEntityNameFromClassName($className);

        return [
            new ClassObject(
                $this->appNamespace . '\\ViewModels\\Web\\' . $domain,
                'List' . Inflector::pluralize($entityName) . 'Builder'
            ),
            new ClassObject(
                $this->appNamespace . '\\ViewModels\\Web\\' . $domain . '\\Impl',
                'List' . Inflector::pluralize($entityName) . 'BuilderImpl'
            ),
        ];
    }

    public function getListViewModels(string $className): array
    {
        [$domain, $entityName] = $this->getDomainAndEntityNameFromClassName($className);

        return [
            new ClassObject(
                $this->appNamespace . '\\ViewModels\\Web\\' . $domain,
                'List' . Inflector::pluralize($entityName)
            ),
            new ClassObject(
                $this->appNamespace . '\\ViewModels\\Web\\' . $domain . '\\Impl',
                'List' . Inflector::pluralize($entityName) . 'Impl'
            ),
        ];
    }

    public function getShowViewModelBuilders(string $className): array
    {
        [$domain, $entityName] = $this->getDomainAndEntityNameFromClassName($className);

        return [
            new ClassObject($this->appNamespace . '\\ViewModels\\Web\\' . $domain, 'Show' . $entityName . 'Builder'),
            new ClassObject(
                $this->appNamespace . '\\ViewModels\\Web\\' . $domain . '\\Impl',
                'Show' . $entityName . 'BuilderImpl'
            ),
        ];
    }

    public function getShowViewModels(string $className): array
    {
        [$domain, $entityName] = $this->getDomainAndEntityNameFromClassName($className);

        return [
            new ClassObject($this->appNamespace . '\\ViewModels\\Web\\' . $domain, 'Show' . $entityName),
            new ClassObject($this->appNamespace . '\\ViewModels\\Web\\' . $domain . '\\Impl', 'Show' . $entityName . 'Impl'),
        ];
    }

    public function getViewModelAssemblerTrait(string $className): ClassObject
    {
        [$domain, $entityName] = $this->getDomainAndEntityNameFromClassName($className);

        return new ClassObject(
            $this->appNamespace . '\\ViewModels\\Web\\' . $domain,
            $entityName . 'AssemblerTrait'
        );
    }

    public function getViewModelDetail(string $className): ClassObject
    {
        [$domain, $entityName] = $this->getDomainAndEntityNameFromClassName($className);

        return new ClassObject($this->appNamespace . '\\ViewModels\\Web\\' . $domain, $entityName . 'Detail');
    }

    public function getViewModelDetailAssembler(string $className): ClassObject
    {
        [$domain, $entityName] = $this->getDomainAndEntityNameFromClassName($className);

        return new ClassObject(
            $this->appNamespace . '\\ViewModels\\Web\\' . $domain,
            $entityName . 'DetailAssembler',
            true
        );
    }

    public function getViewModelDetailAssemblerImpl(string $className): ClassObject
    {
        [$domain, $entityName] = $this->getDomainAndEntityNameFromClassName($className);

        return new ClassObject(
            $this->appNamespace . '\\ViewModels\\Web\\' . $domain . '\\Impl',
            $entityName . 'DetailAssemblerImpl'
        );
    }

    public function getViewModelListItemAssembler(string $className): ClassObject
    {
        [$domain, $entityName] = $this->getDomainAndEntityNameFromClassName($className);

        return new ClassObject(
            $this->appNamespace . '\\ViewModels\\Web\\' . $domain,
            $entityName . 'ListItemAssembler',
            true
        );
    }

    public function getViewModelListItemAssemblerImpl(string $className): ClassObject
    {
        [$domain, $entityName] = $this->getDomainAndEntityNameFromClassName($className);

        return new ClassObject(
            $this->appNamespace . '\\ViewModels\\Web\\' . $domain . '\\Impl',
            $entityName . 'ListItemAssemblerImpl'
        );
    }

    /**
     * @inheritdoc
     */
    public function getViewModels(string $className): array
    {
        [$domain, $entityName] = $this->getDomainAndEntityNameFromClassName($className);

        return [
            new ClassObject(
                $this->appNamespace . '\\ViewModels\\Web\\' . $domain,
                $entityName,
                false,
                true
            ),
            new ClassObject(
                $this->appNamespace . '\\ViewModels\\Web\\' . $domain,
                $entityName . 'Detail',
                false,
                true
            ),
            new ClassObject(
                $this->appNamespace . '\\ViewModels\\Web\\' . $domain . '\\Impl',
                $entityName . 'DetailImpl'
            ),
        ];
    }
}
