<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface FunctionalEntityDetailResponse extends FunctionalEntityResponse
{
    /**
     * @return \DateTimeImmutable
     */
    public function getField4(): ?\DateTimeImmutable;
}
