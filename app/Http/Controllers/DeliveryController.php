<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeliveryRequest;
use App\Models\Delivery;
use App\Models\SuratJalan;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $delivery = Delivery::all();
        $suratjalan = SuratJalan::all();
        return view('delivery.index', compact('delivery', 'suratjalan'));
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
    public function store(DeliveryRequest $request)
    {
        $attr = $request->all();

        Delivery::create($attr);

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
        $delivery = Delivery::findOrFail($id);

        return response()->json($delivery);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DeliveryRequest $request, $id)
    {
        $attr = $request->all();

        $delivery = Delivery::findOrFail($id);

        $delivery->update($attr);

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
        $delivery = Delivery::findOrFail($id);

        $delivery->delete();

        return redirect()->back();
    }

    public function createPDF()
    {
        $delivery = Delivery::with('suratjalan')->get();

        return view('delivery.pdf', compact('delivery'));
    }

    //getDelivery
    public function getDelivery(Request $request)
    {
        $delivery = Delivery::with('suratjalan')->where('surat_jalan_id', $request->surat_jalan_id)->get();
        if ($delivery) {
            return response()->json([
                'status' => 'success',
                'data' => $delivery
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Data tidak ditemukan',
                'data' => []
            ]);
        }
    }
}
