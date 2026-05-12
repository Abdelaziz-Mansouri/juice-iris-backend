<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Order::latest()->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'items' => 'required|array',
            'total_price' => 'required|numeric',
            'address' => 'required|string',
        ]);

        $order = Order::create($request->all());

        return response()->json($order, 201);
    }

    public function show(Order $order)
    {
        return $order;
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|string|in:pending,sent,cancelled',
        ]);

        $order->update($request->only('status'));

        return response()->json($order);
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return response()->json(['message' => 'تم حذف الطلب بنجاح']);
    }
}
