<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Commands;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
final class CommandLabelType
{
    const ALREADY_EXIST_OUTPUT = 'This files have not been created because they already exist :';

    const DUMP_OUTPUT = 'The command will try to generate the following files : ';

    const GENERATED_OUTPUT = 'The command have generated the following sources : ';
}
