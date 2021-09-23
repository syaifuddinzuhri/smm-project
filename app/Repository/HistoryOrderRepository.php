<?php

namespace App\Repository;

use App\Repository\RepositoryInterface;
use App\Models\HistoryOrder;
use App\Traits\ApiResponse;

class HistoryOrderRepository extends BaseRepository implements RepositoryInterface
{
    use ApiResponse;
    protected $model;

    public function __construct(HistoryOrder $model)
    {
        $this->model = $model;
    }
}