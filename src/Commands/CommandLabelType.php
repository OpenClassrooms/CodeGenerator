<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Commands;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
final class CommandLabelType
{
    const ALREADY_EXIST_OUTPUT = 'This files were not created because they already exist:';

    const DUMP_OUTPUT = 'The command will generate the following files: ';

    const GENERATED_OUTPUT = 'The command generates the following sources: ';
}
