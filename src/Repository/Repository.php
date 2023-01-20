<?php

declare(strict_types=1);

namespace App\Repository;

use App\DataObject\CarInterface;
use App\Entity\CarEntity;

class Repository implements RepositoryInterface
{
    protected array $cars;

    public function save(CarEntity $car): void
    {
        $this->cars[] = $car;
    }

    public function get(): array
    {
        return $this->cars;
    }
}