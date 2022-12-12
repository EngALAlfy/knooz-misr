<?php

namespace App\Http\Controllers;

use App\Models\ShipPolicyRecord;
use App\Http\Requests\StoreShipPolicyRecordRequest;
use App\Http\Requests\UpdateShipPolicyRecordRequest;
use App\Models\Material;
use App\Models\Order;
use App\Models\PieceStore;
use App\Models\ShipPolicy;
use Illuminate\Support\Facades\Auth;

class ShipPolicyRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Order $order,  ShipPolicy $shipPolicy)
    {
        $records = ShipPolicyRecord::where('ship_policy_id', $shipPolicy->id)->with('material', 'user:id,name')->get();
        return view('orders.ship-policies.records.all', compact('records', 'order', 'shipPolicy'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Order $order, ShipPolicy $shipPolicy)
    {
        $materials = Material::all();
        return view('orders.ship-policies.records.create', compact('order', 'shipPolicy', 'materials'));
    }

    public function print(Order $order, ShipPolicy $shipPolicy)
    {
        $records = ShipPolicyRecord::where('ship_policy_id', $shipPolicy->id)->with('material')->get();
        return view('orders.ship-policies.records.print', compact('order', 'shipPolicy', 'records'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreShipPolicyRecordRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreShipPolicyRecordRequest $request, Order $order, ShipPolicy $shipPolicy)
    {
        $data = $request->validated();

        $material_id = $data['material_id'];
        $length = $data['length'];
        $width = $data['width'];
        $thickness = $data['thickness'];
        $finish_type = $data['finish_type'];
        $count = $data['count'];

        // get pieces from the storage
        $pieces = PieceStore::where('status', "good")->where('position', "current")->where('material_id', $material_id)->where('finish_type', $finish_type)->where('length', $length)->where('thickness', $thickness)->where('width', $width)->get();
       // dd($pieces);
        if (!isset($pieces) || count($pieces) <= 0) {
            // no pieces in storage


            // get material name
            $material = Material::find($material_id);
            if (!isset($material)) {
                return back()->with('error', 'الخامة غير موجودة في قواعد البيانات');
            }



            $material_name = $material->name;

            // get finish type name
            $finish_type_name = ($finish_type=="type1" ? "غشيم" : ($finish_type=="type2" ?"هوند" : ($finish_type=="type3" ?"براشد": ($finish_type=="type4" ?"لامع مباشر": ($finish_type=="type5" ?"لامع رماله" : ($finish_type=="type6" ? "لامع" : ($finish_type=="type7" ? "لامع معالج" : "N/A")))))));

            $error = 'مقاس '.$length .'x'. $width .'x'. $thickness .' '. $material_name .' '. $finish_type_name .' غير متوفر في المخزن';

            return back()->with('error', $error)->withInput();

        }

        // get all pieces count
        $all_count = 0;
        foreach ($pieces as $key => $value) {
            $all_count += $value->count;
        }



        if($all_count < $count){
            // get material name
            $material = Material::find($material_id);
            if (!isset($material)) {
                return back()->with('error', 'الخامة غير موجودة في قواعد البيانات');
            }



            $material_name = $material->name;

            // get finish type name
            $finish_type_name = ($finish_type=="type1" ? "غشيم" : ($finish_type=="type2" ?"هوند" : ($finish_type=="type3" ?"براشد": ($finish_type=="type4" ?"لامع مباشر": ($finish_type=="type5" ?"لامع رماله" : ($finish_type=="type6" ? "لامع" : ($finish_type=="type7" ? "لامع معالج" : "N/A")))))));

            $error = 'مقاس '.$length .'x'. $width .'x'. $thickness .' '. $material_name .' '. $finish_type_name .' متوفر في المخزن فقط '. $all_count . ' وهو غير كافي للكمية المطلوبة '. $count;

            return back()->with('error', $error)->withInput();
        }

        // check every pieces for count
        foreach ($pieces as $key => $value) {
            if($count <= 0){
                break;
            }

            if($count < $value->count){
                $value->count -= $count;
                $value->save();
                // create a shipped pieces with the count
                $shipped = new PieceStore;
                $shipped->count  = $count;
                $shipped->create_user_id  = Auth::user()->id;
                $shipped->length  = $value->length;
                $shipped->width  = $value->width;
                $shipped->thickness  = $value->thickness;
                $shipped->finish_type  = $value->finish_type;
                $shipped->status  = $value->status;
                $shipped->position  = "shipped";
                $shipped->material_id  = $value->material_id;
                $shipped->save();
                // stop the loop
                break;
            }else{
                $count -= $value->count;
                $value->position = "shipped";
                $value->save();
            }
        }


        $data['create_user_id'] = Auth::user()->id;
        $data['order_id'] = $order->id;
        $data['ship_policy_id'] = $shipPolicy->id;

        ShipPolicyRecord::create($data);

        if($request->has('last')){
            return redirect()->route('orders.ship-policies.records', compact('order', 'shipPolicy'));
        }else{
            return back()->with('success', "تم اضافة المقاس الي البوليصة")->withInput();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShipPolicyRecord  $shipPolicyRecord
     * @return \Illuminate\Http\Response
     */
    public function show(ShipPolicyRecord $shipPolicyRecord)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShipPolicyRecord  $shipPolicyRecord
     * @return \Illuminate\Http\Response
     */
    public function edit(ShipPolicyRecord $shipPolicyRecord)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateShipPolicyRecordRequest  $request
     * @param  \App\Models\ShipPolicyRecord  $shipPolicyRecord
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateShipPolicyRecordRequest $request, ShipPolicyRecord $shipPolicyRecord)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShipPolicyRecord  $shipPolicyRecord
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order, ShipPolicy $shipPolicy, ShipPolicyRecord $shipPolicyRecord)
    {
        $shipPolicyRecord->delete();
        return redirect()->route('orders.ship-policies.records', compact('order', 'shipPolicy'));
    }
}
