<?php

namespace App\Enums;

enum CommentStateEnum: string
{
    case LOCK = "bloqué";

    case OPEN = "ouvert";
}
