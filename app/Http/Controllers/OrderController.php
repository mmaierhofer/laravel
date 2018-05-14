<?php

namespace App\Http\Controllers;

use App\Book;
use App\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent;
use Illuminate\Support\Facades\DB;
use App\Order;

class OrderController extends Controller
{
    public function index() {
        $order = Order::with(['books'])
            ->get();
        return $order;
    }

    public function findByUserId($user_id) {
        $order = Order::with(['books'])->where('user_id',$user_id)
            ->get();
        return $order;
    }


    public function save(Request $request) : JsonResponse{

        $request = $this->parseRequest($request);

        DB::beginTransaction();
        try {

            $order = Order::create($request->all());

            $bc = new BookController();

            if (isset($request['books']) && is_array($request['books'])) {
                foreach ($request['books'] as $b) {
                    $book = $bc->findByISBN($b['isbn']);
                    $order->books()->save($book);
                }
            }

            DB::commit();
            return response()->json($order, 201);
        }catch (\Exception $e) {
            // rollback all queries
            DB::rollBack();
            return response()->json("saving order failed: " . $e->getMessage(), 420);
        }
    }


    private function parseRequest(Request $request) : Request {
        // get date and convert it - its in ISO 8601, e.g. "2018-01-01T23:00:00.000Z"
        $date = new \DateTime($request->published);
        $request['published'] = $date;
        return $request;
    }
}
