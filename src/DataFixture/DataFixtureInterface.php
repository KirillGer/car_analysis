<?php

declare(strict_types=1);

namespace App\DataFixture;
interface DataFixtureInterface {
    public function create(): array;
}