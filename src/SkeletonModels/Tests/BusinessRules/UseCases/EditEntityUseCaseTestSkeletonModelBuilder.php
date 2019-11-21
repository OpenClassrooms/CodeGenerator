<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface EditEntityUseCaseTestSkeletonModelBuilder
{
    public function create(): EditEntityUseCaseTestSkeletonModelBuilder;

    public function withEditEntityUseCaseTestFileObject(
        FileObject $editEntityUseCaseTestFileObject
    ): EditEntityUseCaseTestSkeletonModelBuilder;

    public function withEditEntityUseCaseFileObject(
        FileObject $editEntityUseCaseFileObject
    ): EditEntityUseCaseTestSkeletonModelBuilder;

    public function withEditEntityUseCaseRequestFileObject(
        FileObject $editEntityUseCaseRequestFileObject
    ): EditEntityUseCaseTestSkeletonModelBuilder;

    public function withEditEntityUseCaseRequestBuilderImplFileObject(
        FileObject $editEntityUseCaseRequestBuilderImplFileObject
    ): EditEntityUseCaseTestSkeletonModelBuilder;

    public function withEditEntityUseCaseRequestDTOFileObject(
        FileObject $editEntityUseCaseRequestDTOFileObject
    ): EditEntityUseCaseTestSkeletonModelBuilder;

    public function withEntityFileObject(FileObject $entityFileObject): EditEntityUseCaseTestSkeletonModelBuilder;

    public function withEntityNotFoundExceptionFileObject(
        FileObject $entityNotFoundExceptionFileObject
    ): EditEntityUseCaseTestSkeletonModelBuilder;

    public function withEntityStubFileObject(
        FileObject $entityStubFileObject
    ): EditEntityUseCaseTestSkeletonModelBuilder;

    public function withEntityUseCaseDetailResponseAssemblerMockFileObject(
        FileObject $entityUseCaseDetailResponseAssemblerMockFileObject
    ): EditEntityUseCaseTestSkeletonModelBuilder;

    public function withEntityUseCaseDetailResponseFileObject(
        FileObject $entityUseCaseDetailResponseFileObject
    ): EditEntityUseCaseTestSkeletonModelBuilder;

    public function withEntityUseCaseDetailResponseStubFileObject(
        FileObject $entityUseCaseDetailResponseStubFileObject
    ): EditEntityUseCaseTestSkeletonModelBuilder;

    public function withEntityUseCaseDetailResponseTestCaseFileObject(
        FileObject $entityUseCaseDetailResponseTestCaseFileObject
    ): EditEntityUseCaseTestSkeletonModelBuilder;

    public function withInMemoryEntityUseCaseGatewayFileObject(
        FileObject $inMemoryEntityUseCaseGatewayFileObject
    ): EditEntityUseCaseTestSkeletonModelBuilder;

    public function build(): EditEntityUseCaseTestSkeletonModel;
}
