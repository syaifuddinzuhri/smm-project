<?php

namespace App\Repository;

use App\Repository\RepositoryInterface;
use App\Models\Product;
use App\Traits\ApiResponse;

class ProductRepository extends BaseRepository implements RepositoryInterface
{
    use ApiResponse;
    protected $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }
}