<?php

namespace App\Http\Controllers;

use App\Http\Requests\LaporanPenjualanRequest;
use App\Models\Customer;
use App\Models\Driver;
use App\Models\LaporanPenjualan;
use App\Models\SuratJalan;
use App\Models\Truck;
use Illuminate\Http\Request;

class LaporanPenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //all
        $laporan = LaporanPenjualan::all();
        $truck = Truck::all();
        $driver = Driver::all();
        $suratjalan = SuratJalan::all();
        $customer = Customer::all();
        return view('lap_penjualan.index', compact('laporan', 'truck', 'driver', 'suratjalan', 'customer'));
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
    public function store(LaporanPenjualanRequest $request)
    {
        $attr = $request->all();

        LaporanPenjualan::create($attr);

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
        $laporan = LaporanPenjualan::findOrFail($id);
        
        return response()->json($laporan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $attr = $request->all();

        $laporan = LaporanPenjualan::findOrFail($id);

        $laporan->update($attr);

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
        $laporan = LaporanPenjualan::findOrFail($id);

        $laporan->delete();

        return redirect()->back();
    }
}
