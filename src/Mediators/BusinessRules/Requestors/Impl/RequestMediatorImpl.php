<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Mediators\BusinessRules\Requestors\Impl;

use OpenClassrooms\CodeGenerator\Gateways\FileObject\FileObjectGateway;
use OpenClassrooms\CodeGenerator\Mediators\Args;
use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\Requestors\RequestMediator;
use OpenClassrooms\CodeGenerator\Mediators\Options;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class RequestMediatorImpl implements RequestMediator
{
    use RequestGeneratorsTrait;

    /**
     * @var FileObjectGateway
     */
    private $fileObjectGateway;

    public function mediate(array $args = [], array $options = []): array
    {
        $useCase = $args[Args::USE_CASE];
        $domain = $args[Args::DOMAIN];

        $fileObjects = [];
        if (false !== $options[Options::NO_TEST] || !$options[Options::DUMP] && !$options[Options::NO_TEST]) {
            $fileObjects[] = $this->generateGenericUseCaseRequest($domain, $useCase);
            $fileObjects[] = $this->generateGenericUseCaseRequestBuilder($domain, $useCase);
        }
        if (false === $options[Options::DUMP]) {
            $this->fileObjectGateway->flush();
        }

        return $fileObjects;
    }

    public function setFileObjectGateway(FileObjectGateway $fileObjectGateway): void
    {
        $this->fileObjectGateway = $fileObjectGateway;
    }
}
