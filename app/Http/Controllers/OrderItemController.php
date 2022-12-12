<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use App\Http\Requests\StoreOrderItemRequest;
use App\Http\Requests\UpdateOrderItemRequest;
use App\Models\Material;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderItemController extends Controller
{
    public function index(Order $order)
    {
        //
        $items = OrderItem::where('order_id' , $order->id)->with('material')->get();
        return view('orders.items.all' , compact('items' , 'order'));
    }

    public function create(Order $order)
    {
        $materials = Material::all();
        return view('orders.items.create' , compact('materials' , 'order'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Order $order , StoreOrderItemRequest $request)
    {
        $data = $request->validated();

        $data['create_user_id'] = Auth::user()->id;
        $data['order_id'] = $order->id;

        OrderItem::create($data);

        return redirect()->route('orders.items' , $order);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderItem  $orderItem
     * @return \Illuminate\Http\Response
     */
    public function show(OrderItem $orderItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrderItem  $orderItem
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderItem $orderItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderItemRequest  $request
     * @param  \App\Models\OrderItem  $orderItem
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderItemRequest $request, OrderItem $orderItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderItem  $orderItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderItem $orderItem)
    {
        //
    }
}
