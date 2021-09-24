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

    public function index()
    {
        $datas = $this->all();
        return response()->json([
            'status'   => true,
            'values'    => $datas,
            'message'   => 'Products data has been successfully obtained'
        ], 200);
    }

    public function store($request)
    {
        try {
            $payload = $request->all();
            $datas = $this->create($payload);
            
            return response()->json([
                'status'   => true,
                'message' => 'Product data successfully created',
                'values'    => $datas,
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ], 400);
        }
    }

    public function edit($id)
    {
        try {
            $datas = $this->findById($id);
            return response()->json([
                'status'    => true,
                'values'     => $datas,
                'message'   => 'Product data successfully obtained'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ], 400);
        }
    }

    public function updateProduct($request, $id)
    {
        try {
            $payload = $request->all();
            $datas = $this->update($id, $payload);
            return response()->json([
                'status'   => true,
                'values'    => $datas,
                'message'   => 'Product data has been successfully updated'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ], 400);
        }
    }

    public function destroy($id)
    {
        try {
            $this->deleteById($id);
            return response()->json([
                'status'   => true,
                'message'   => 'Product data has been successfully deleted'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ], 400);
        }
    }
}