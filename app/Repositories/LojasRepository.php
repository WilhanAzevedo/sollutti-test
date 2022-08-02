<?php

namespace App\Repositories;

use App\Models\Loja;
use App\Repositories\Contracts\LojasRepositoryInterface;

class LojasRepository extends AbstractRepository implements LojasRepositoryInterface
{
    protected $model = Loja::class;
}



