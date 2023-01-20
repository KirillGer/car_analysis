<?php

declare(strict_types=1);

namespace App\Factory;

use App\DataFixture\DataFixtureInterface;
use App\Entity\CarEntity;
use App\Provider\ProviderInterface;

class CarFactory implements CarFactoryInterface
{
    protected array $data;

    protected ProviderInterface $provider;

    public function __construct(
        DataFixtureInterface $dataFixture,
        ProviderInterface $provider
    ){
        $this->data = $dataFixture->create();
        $this->provider = $provider;
    }

    public function createFactory(): void
    {
        $createCarsData = $this->createCarsData();

        foreach ($createCarsData as $item) {
            $this->provider->initialization($this->createCarEntity($item));
        }
    }

    protected function createCarEntity($car): CarEntity
    {
        return (new CarEntity())
            ->setCarType($car['carType'])
            ->setBrand($car['brand'])
            ->setPhotoFileName($car['photoFileName'])
            ->setCarrying($car['carrying'])
            ->setExtra($car['extra'])
            ->setPassengerSeatsCount($car['passengerSeatsCount'])
            ->setBodyWhl($car['bodyWhl'])
            ->setBodyWidth()
            ->setBodyHeight()
            ->setBodyLength();
    }

    protected function createCarsData(): array
    {
        $fieldsName = $this->fieldsNameConverter($this->data[0][0]);
        array_shift($this->data);

        $carsData = [];
        foreach ($this->data as $key => $value) {
            $column = explode(";", $this->data[$key][0]);

            foreach ($column as $columnKey => $columnValue) {
                if (empty($columnValue)) {
                    $columnValue = null;
                }

                $carsData[$key][$fieldsName[$columnKey]] = $columnValue;
            }
        }

        return $carsData;
    }

    protected function fieldsNameConverter(string $fields): array
    {
        $newNameFields = [];
        $fields = explode(";", $fields);

        foreach ($fields as $field) {
            $newNameFields[] = $this->refactoringNameField($field);
        }

        return $newNameFields;
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