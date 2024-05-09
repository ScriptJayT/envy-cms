<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class MessageType extends Enum
{
    const INFO = "Info";
    const WARNING = "Warning";
    const ERROR = "Error";
}
