<?php

namespace OpenClassrooms\CodeGenerator\FileObjects;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
final class FileObjectType
{
    const API_VIEW_MODEL = 'API_VIEW_MODEL';

    const API_VIEW_MODEL_ASSEMBLER = 'API_VIEW_MODEL_ASSEMBLER';

    const API_VIEW_MODEL_ASSEMBLER_TEST = 'API_VIEW_MODEL_ASSEMBLER_TEST';

    const API_VIEW_MODEL_DETAIL = 'API_VIEW_MODEL_DETAIL';

    const API_VIEW_MODEL_LIST_ITEM = 'API_VIEW_MODEL_LIST_ITEM';

    const API_VIEW_MODEL_STUB = 'API_VIEW_MODEL_STUB';

    const API_VIEW_TEST_CASE = 'API_VIEW_MODEL_TEST_CASE';

    private function __construct()
    {
    }
}
