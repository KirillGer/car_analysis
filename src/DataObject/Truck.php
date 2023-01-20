<?php

declare(strict_types=1);

namespace App\DataObject;

class Truck extends BaseCar implements CarInterface
{
    // TODO можно разобрать и вывести какой параметр недоступен, например
    public function getBodyVolume(float $height, float $width, float $length): void
    {
        $result = $height * $width * $length;

        if ($result != 0) {
            echo "Объем кузова: " . $result . "<br>";
        } else {
            echo "Недостаточно данных чтобы высчитать объем кузова";
        }
    }
}