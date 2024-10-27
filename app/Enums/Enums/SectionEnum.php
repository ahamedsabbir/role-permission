<?php declare(strict_types=1);

namespace App\Enums\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class SectionEnum extends Enum
{
    const OptionOne = 0;
    const OptionTwo = 1;
    const OptionThree = 2;
}
