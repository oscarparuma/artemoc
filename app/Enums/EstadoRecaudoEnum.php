<?php

namespace Artemoc\Enums;

use Artemoc\Enums\Enum;

abstract class EstadoRecaudoEnum extends Enum {
    const PT = 'Pago total';
    const PP = 'Pago parcial';
    const D = 'Debe';
}