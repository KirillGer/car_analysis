<?php

declare(strict_types=1);

namespace App\Service;

use App\Repository\RepositoryInterface;

interface CarServiceInterface
{
    public function getData(RepositoryInterface $repository): array;
    public function getCarClass(array $cars, string $carType): array;
}