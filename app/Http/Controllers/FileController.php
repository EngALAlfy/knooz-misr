<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Http\Requests\StoreFileRequest;
use App\Http\Requests\UpdateFileRequest;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Order $order)
    {
        $files = File::where('order_id' , $order->id)->with('order' , 'user:id,name')->get();
        return view('orders.files.all' , compact('files' , 'order'));
    }

    public function create(Order $order)
    {
        //
        return view('orders.files.create' ,compact('order'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFileRequest $request , Order $order)
    {
        $data = $request->validated();


        $file = $data['file'];
        $filename = Time() . "-" . $file->getClientOriginalName();
        $dirname = "files" . "/" . $order->number;
        $file->storePubliclyAs( $dirname , $filename, 'public');

        $data['file'] = $filename;

        $data['create_user_id'] = Auth::user()->id;
        $data['order_id'] = $order->id;

        File::create($data);

        return redirect()->route('orders.files' , compact('order'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFileRequest  $request
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFileRequest $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(  Order $order , File $file)
    {
        $file->delete();
        return redirect()->route('orders.files' , compact('order'));
    }
}
