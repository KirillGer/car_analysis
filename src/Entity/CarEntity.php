<?php

declare(strict_types=1);

namespace App\Entity;

class CarEntity {
    private ?string $carType;

    private ?string $photoFileName;

    private ?string $brand;

    private ?float $carrying;

    private ?int $passengerSeatsCount;

    private ?string $bodyWhl;

    private float $bodyWidth;

    private float $bodyHeight;

    private float $bodyLength;

    private ?string $extra;

    public function setCarType(?string $carType): self
    {
        $this->carType = $carType;

        return $this;
    }

    public function getCarType(): string
    {
        return $this->carType;
    }

    public function setPhotoFileName(?string $photoName): self
    {
        $this->photoFileName = $photoName;

        return $this;
    }

    public function getPhotoName(): string
    {
        return $this->photoFileName;
    }

    public function setBrand(?string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getBrand(): string
    {
        return $this->brand;
    }

    public function setCarrying(?string $carrying): self
    {
        $this->carrying = floatval($carrying);

        return $this;
    }

    public function getCarrying(): ?float
    {
        return $this->carrying;
    }

    public function setPassengerSeatsCount(?string $passengerSeatsCount): self
    {
        $this->passengerSeatsCount = (int)$passengerSeatsCount;

        return $this;
    }

    public function getPassengerSeatsCount(): int
    {
        return $this->passengerSeatsCount;
    }

    public function setBodyWhl(?string $bodyWhl): self
    {
        $this->bodyWhl = $bodyWhl;

        return $this;
    }

    public function getBodyWhl(): ?string
    {
        return $this->bodyWhl;
    }

    public function setExtra(?string $extra): self
    {
        $this->extra = $extra;

        return $this;
    }

    public function getExtra(): string
    {
        return $this->extra;
    }

    public function setBodyLength(): self
    {
        if (!is_null($this->getBodyWhl())) {
            $array = explode('x', $this->getBodyWhl());

            $this->bodyLength = floatval($array[0]);
        } else {
            $this->bodyLength = 0;
        }

        return $this;
    }

    public function getBodyLength(): ?float
    {
        return $this->bodyLength;
    }

    public function setBodyWidth(): self
    {
        if (!is_null($this->getBodyWhl())) {
            $array = explode('x', $this->getBodyWhl());

            $this->bodyWidth = floatval($array[1]);
        } else {
            $this->bodyWidth = 0;
        }

        return $this;
    }

    public function getBodyWidth(): ?float
    {
        return $this->bodyWidth;
    }

    public function setBodyHeight(): self
    {
        if (!is_null($this->getBodyWhl())) {
            $array = explode('x', $this->getBodyWhl());

            $this->bodyHeight = floatval($array[2]);
        } else {
            $this->bodyHeight = 0;
        }

        return $this;
    }

    public function getBodyHeight(): ?float
    {
        return $this->bodyHeight;
    }
}