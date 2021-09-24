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

    public function index()
    {
        $datas = $this->all();
        return response()->json([
            'status'   => true,
            'values'    => $datas,
            'message'   => 'Members data has been successfully obtained'
        ], 200);
    }

    public function updateMember($request, $id)
    {
        try {
            $payload = $request->all();
            $datas = $this->update($id, $payload);
            return response()->json([
                'status'   => true,
                'values'    => $datas,
                'message'   => 'Balance has been successfully updated'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ], 400);
        }
    }
}