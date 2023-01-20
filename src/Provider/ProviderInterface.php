<?php

declare(strict_types=1);

namespace App\Provider;

use App\Entity\CarEntity;

interface ProviderInterface
{
    public function initialization(CarEntity $carEntity): void;
}