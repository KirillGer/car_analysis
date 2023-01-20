<?php

declare(strict_types=1);

namespace App\Controller;
use App\DataFixture\CarDataFixture;
use App\DataObject\Truck;
use App\Entity\CarEntity;
use App\Factory\CarFactory;
use App\Repository\Repository;
use App\Service\CarService;
use App\Provider\Provider;

class FrontendController {
    protected const CLASS_NAME = Truck::class;

    public function __invoke(): void
    {
        $repository = new Repository();

        $factory = new CarFactory(
            new CarDataFixture(),
            new Provider($repository)
        );

        $cars = new CarService($factory);
        $selectedCars = $cars->getCarClass($cars->getData($repository), self::CLASS_NAME);
        $this->byTypeCar($selectedCars);
    }

    protected function byTypeCar(array $selectedCars): void
    {
        foreach ($selectedCars as $selectedCar) {
            $className = self::CLASS_NAME;
            $carClass = new $className($selectedCar);
            $carClass->getInfo($selectedCar);

            /** @var $selectedCar CarEntity */
            $carClass->getBodyVolume(
                $selectedCar->getBodyHeight(),
                $selectedCar->getBodyWidth(),
                $selectedCar->getBodyLength()
            );
        }
    }
}