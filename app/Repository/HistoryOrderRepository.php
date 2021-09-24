<?php

namespace App\Repository;

use App\Repository\RepositoryInterface;
use App\Models\HistoryOrder;
use App\Models\Product;
use App\Traits\ApiResponse;

class HistoryOrderRepository extends BaseRepository implements RepositoryInterface
{
    use ApiResponse;
    protected $model;

    public function __construct(HistoryOrder $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $datas = $this->all(['*'], ['member', 'product']);
        return response()->json([
            'status'   => true,
            'values'    => $datas,
            'message'   => 'Orders data has been successfully obtained'
        ], 200);
    }

    public function store($request)
    {
        try {
            $payload = $request->all();
            $product = Product::findOrFail($payload['product_id']);
            $member = Member::findOrFail($payload['member_id']);
            $payload['total'] = $payload['qty'] * $payload['price']; 

            if($member->balance < $payload['total']){
                $message = 'Your balance is not enough to make this purchase, please top up the balance first!';
            }else if($product->stock < $payload['qty']){
                $message = 'Product stock is less than the purchase amount, please enter the purchase amount according to stock or less than stock!';
            }else{
                $message = 'Order successfully created';
            }

            $stockProduct = $product->stock - $payload['qty'];
            $balanceMember = $member->balance - $payload['total'];
            $memberUpdate = Member::where('id', $payload['member_id'])
            ->update([
                'balance' => $balanceMember
            ]);
            $productUpdate = Product::where('id', $payload['product_id'])
            ->update([
                'stock' => $stockProduct
            ]);

            $datas = $this->create($payload);
            
            return response()->json([
                'status'   => true,
                'message' => $message,
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
            $datas = $this->findById($id, ['*'], ['member', 'product']);
            return response()->json([
                'status'    => true,
                'values'     => $datas,
                'message'   => 'Order data successfully obtained'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ], 400);
        }
    }

    public function getAllOrderByIdMember()
    {
        try {
            $datas = $this->getModel()
                    ->with(['member', 'product'])
                    ->where('member_id', \Auth::user()->id)
                    ->get();
            return response()->json([
                'status'    => true,
                'values'     => $datas,
                'message'   => 'Orders data successfully obtained'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ], 400);
        }
    }
}