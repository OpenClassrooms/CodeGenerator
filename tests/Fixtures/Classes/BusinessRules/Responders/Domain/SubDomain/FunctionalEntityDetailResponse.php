<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
interface FunctionalEntityDetailResponse extends FunctionalEntityResponse
{
    /**
     * @return \DateTime
     */
    public function getField4();
}
