<?php

namespace App\Http\Controllers;

use App\Http\Requests\SuratJalanRequest;
use App\Models\Customer;
use App\Models\Driver;
use App\Models\Karyawan;
use App\Models\SuratJalan;
use App\Models\Truck;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SuratJalanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $params = $request->except('_token');   
        $suratjalan = SuratJalan::filter($params)->latest()->paginate($params['show'] ?? 10);
        $customer = Customer::all();
        $driver = Driver::all();
        $karyawan = Karyawan::where('posisi', 'Karyawan')->get();
        $truck = Truck::all();
        return view('surat_jalan.index', compact('suratjalan', 'customer', 'driver', 'karyawan', 'truck'));
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
    
    public function createPDF(Request $request)
    {
        $from_date = Carbon::parse($request->from_date)->toDateTimeString();

        $to_date = Carbon::parse($request->to_date)->toDateTimeString();
        //suratjalan with driver,customer,karyawan
        $suratjalan = SuratJalan::with('driver', 'customer', 'karyawan')->whereBetween('tanggal_kirim',[$from_date,$to_date])->get();
        return view('surat_jalan.pdf', compact('suratjalan'));
    }
    
    //cetakSurat
    public function cetakSurat($id)
    {
        //find or fail with driver,customer,karyawan
        $suratjalan = SuratJalan::with('driver', 'customer', 'karyawan')->findOrFail($id);
        return view('surat_jalan.cetak', compact('suratjalan'));
    }
}
