<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Commands;

final class CommandLabelType
{
    public const ALREADY_EXIST_OUTPUT = 'This files were not created because they already exist:';

    public const DUMP_OUTPUT          = 'The command will generate the following files: ';

    public const GENERATED_OUTPUT     = 'The command generates the following sources: ';
}
