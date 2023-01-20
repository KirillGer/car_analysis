<?php

declare(strict_types=1);

namespace App\DataFixture;

class CarDataFixture implements DataFixtureInterface
{
    protected const FILE = './data.csv';

    public function create(): array
    {
        $file = $this->filterFile();

        return array_map('str_getcsv', $file);
    }

    protected function filterFile(): array
    {
        $lines = file(__DIR__ . self::FILE, FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);

        $sortFile =[];
        foreach ($lines as $line) {
            if (rtrim($line, ';')) {
                $sortFile[] = $line;
            }
        }

        return $sortFile;
    }
}