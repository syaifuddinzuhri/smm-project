<?php

namespace App\Repository;

use App\Repository\RepositoryInterface;
use App\Models\Member;
use App\Traits\ApiResponse;

class MemberRepository extends BaseRepository implements RepositoryInterface
{
    use ApiResponse;
    protected $model;

    public function __construct(Member $model)
    {
        $this->model = $model;
    }
}