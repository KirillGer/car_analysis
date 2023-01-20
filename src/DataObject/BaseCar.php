<?php

declare(strict_types=1);

namespace App\DataObject;

use App\Entity\CarEntity;

class BaseCar
{
    protected array $cars;

    public function __construct(CarEntity $carEntity)
    {
        $this->cars[] = $carEntity;
    }

    public function getCars(): array
    {
        return $this->cars;
    }

    // TODO только для того, чтобы показать на фронте. В дальнейшем удалить
    public function getInfo(CarEntity $carEntity): void
    {
        $information = "Марка:" . $carEntity->getBrand() . "</br>";
        $information .= "Тип авто:" . $carEntity->getCarType() . "<br/>";
        $information .= "Расширение фото авто:" . $this->getPhotoFileExt($carEntity->getPhotoName()) . "<br/>";

        echo $information;
    }

    public function getPhotoFileExt(string $photo): string
    {
        $array = explode('.', $photo);

        return end($array);
    }
}