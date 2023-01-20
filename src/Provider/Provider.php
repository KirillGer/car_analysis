<?php

declare(strict_types=1);

namespace App\Provider;

use App\Entity\CarEntity;
use App\Repository\RepositoryInterface;

class Provider implements ProviderInterface
{
    protected RepositoryInterface $repositoryManage;

    public function __construct(RepositoryInterface $repository)
    {
        $this->repositoryManage = $repository;
    }

    public function initialization(CarEntity $carEntity): void
    {
        $this->repositoryManage->save($carEntity);
    }
}