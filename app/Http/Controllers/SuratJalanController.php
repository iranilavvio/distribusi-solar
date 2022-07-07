<?php

namespace App\Http\Controllers;

use App\Http\Requests\SuratJalanRequest;
use App\Models\Customer;
use App\Models\Driver;
use App\Models\Karyawan;
use App\Models\SuratJalan;
use App\Models\Truck;
use Illuminate\Http\Request;

class SuratJalanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //all
        $suratjalan = SuratJalan::all();
        $driver = Driver::all();
        $truck = Truck::all();
        $customer = Customer::all();
        $karyawan = Karyawan::all();

        return view('surat_jalan.index', compact('suratjalan', 'driver', 'truck', 'customer', 'karyawan'));
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
    public function store(SuratJalanRequest $request)
    {
        //attr 
        $attr = $request->all();

        //insert into table
        SuratJalan::create($attr);

        //redirect
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
        //find or fail
        $suratjalan = SuratJalan::findOrFail($id);

        //return response
        return response()->json($suratjalan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SuratJalanRequest $request, $id)
    {
        //find or fail
        $suratjalan = SuratJalan::findOrFail($id);

        //attr
        $attr = $request->all();

        //update
        $suratjalan->update($attr);

        //redirect
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
        //find or fail
        $suratjalan = SuratJalan::findOrFail($id);

        //delete
        $suratjalan->delete();

        //redirect
        return redirect()->back();
    }
}
