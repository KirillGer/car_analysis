<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\CarEntity;

interface RepositoryInterface
{
    public function save(CarEntity $car): void;
    public function get(): array;
}