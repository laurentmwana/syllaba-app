<?php

namespace App\Enums;

enum PaymentEnum: string
{
    case PENDING = "En Attente";

    case SUCCESS = "Effectué";

    case CANCELED = "Annulé";

    case REFUSED = "Refusé";
}
