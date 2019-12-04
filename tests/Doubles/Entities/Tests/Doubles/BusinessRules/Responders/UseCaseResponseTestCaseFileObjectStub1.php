<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\Doubles\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

class UseCaseResponseTestCaseFileObjectStub1 extends FileObject
{
    const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\Doubles\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityResponseTestCase';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../../../../Fixtures/Classes/Tests/Doubles/BusinessRules/Responders/Domain/SubDomain/FunctionalEntityResponseTestCase.php';
        $this->className = self::CLASS_NAME;
    }
}
