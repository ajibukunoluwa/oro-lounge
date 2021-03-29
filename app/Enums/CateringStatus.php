<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Available()
 * @method static static Canceled()
 * @method static static Expired()
 */
final class CateringStatus extends Enum
{
    const Available = 1;
    const Canceled = 2;
    const Expired = 3;
}
