<?php

namespace App\Http\Controllers;

use App\Http\Requests\ControlDeliveryRequest;
use App\Models\ControlDelivery;
use App\Models\SuratJalan;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class ControlDeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $control = ControlDelivery::all();
        $suratjalan = SuratJalan::all();
        return view('control_delivery.index', compact('control', 'suratjalan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ControlDeliveryRequest $request)
    {
        $attr = $request->all();

        ControlDelivery::create($attr);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $control = ControlDelivery::findOrFail($id);
        
        return response()->json($control);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ControlDeliveryRequest $request, $id)
    {
        $attr = $request->all();

        ControlDelivery::findOrFail($id)->update($attr);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ControlDelivery::findOrFail($id)->delete();

        return redirect()->back();
    }
}
