<?php

namespace App\Enums;

enum NewLetterStateEnum: string
{
    case SUBSCRIBE = "Inscrit(e)";

    case UNSUBSCRIBE = "Desinscrit(e)";
}
