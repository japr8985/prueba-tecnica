<?php

namespace App\Enums;

enum TaskStatus: string {
    case PENDING = 'pendiente';
    case IN_PROGRESS = 'en progreso';
    case COMPLETE = 'completada';
}
