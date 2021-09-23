<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{

    public function all(array $column = ['*'], array $relations = [], array $where = []): Collection;
    
    public function allTrashed(): Collection;

    public function findById(
        int $modelId,
        array $column = ['*'], 
        array $relations = [],
        array $appends = []
    ): ?Model;

    public function findTrashedById(
        int $modelId
    ): ?Model;

    public function findOnlyTrashedById(
        int $modelId
    ): ?Model;

    public function create(array $payload): ?Model;

    public function update(int $modelId, array $payload): ?Model;

    public function deleteById(int $modelId): bool;

    public function restoreById(int $modelId): bool;

    public function permanentlyDeletedById(int $modelId): bool;
}
