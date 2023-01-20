<?php

declare(strict_types=1);

namespace App\Service;

use App\Factory\CarFactoryInterface;
use App\Repository\RepositoryInterface;

final class CarService implements CarServiceInterface
{
    public function __construct(CarFactoryInterface $carFactory)
    {
        $carFactory->createFactory();
    }

    public function getData(RepositoryInterface $repository): array
    {
        return $repository->get();
    }

    public function getCarClass(array $cars, string $carType): array
    {
        $className = $this->refactoringNameField(end(explode('\\', $carType)));

        $carsObjects = [];
        foreach ($cars as $car) {
            $carType = $this->refactoringNameField($car->getCarType());
            if ($carType == $className) {
                $carsObjects[] = $car;
            }
        }

        return $carsObjects;
    }

    // TODO лучше убрать в утилиты
    protected function refactoringNameField($string, $capitalizeFirstCharacter = false)
    {
        $str = str_replace('_', '', ucwords($string, '_'));

        if (!$capitalizeFirstCharacter) {
            $str = lcfirst($str);
        }

        return $str;
    }
}