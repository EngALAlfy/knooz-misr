<?php

namespace App\Http\Controllers;

use App\Models\ShipPolicy;
use App\Http\Requests\StoreShipPolicyRequest;
use App\Http\Requests\UpdateShipPolicyRequest;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class ShipPolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Order $order)
    {
        $ships = ShipPolicy::where('order_id' , $order->id)->with('user:id,name')->get();
        return view('orders.ship-policies.all' , compact('ships' , 'order'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Order $order)
    {
        //
        return view('orders.ship-policies.create' , compact('order'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreShipPolicyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreShipPolicyRequest $request ,  Order $order)
    {
        $data = $request->validated();

        $data['create_user_id'] = Auth::user()->id;
        $data['order_id'] = $order->id;

        ShipPolicy::create($data);

        return redirect()->route('orders.ship-policies' , compact('order'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShipPolicy  $shipPolicy
     * @return \Illuminate\Http\Response
     */
    public function show(ShipPolicy $shipPolicy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShipPolicy  $shipPolicy
     * @return \Illuminate\Http\Response
     */
    public function edit(ShipPolicy $shipPolicy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateShipPolicyRequest  $request
     * @param  \App\Models\ShipPolicy  $shipPolicy
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateShipPolicyRequest $request, ShipPolicy $shipPolicy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShipPolicy  $shipPolicy
     * @return \Illuminate\Http\Response
     */
    public function destroy( Order $order , ShipPolicy $shipPolicy)
    {
        $shipPolicy->records()->delete();
        $shipPolicy->delete();
        return redirect()->route('orders.ship-policies'  , compact('order'));
    }
}
