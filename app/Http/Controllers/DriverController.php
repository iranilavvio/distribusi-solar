<?php

namespace App\Http\Controllers;

use App\Http\Requests\DriverRequest;
use App\Models\Driver;
use App\Models\Karyawan;
use App\Models\Truck;
use Illuminate\Http\Request;
use PDF;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $params = $request->except('_token');   
        $driver = Driver::filter($params)->latest()->paginate($params['show'] ?? 10);
        $karyawan = Karyawan::where('posisi', 'Driver')->get();
        $truck = Truck::all();
        return view('driver.index', compact('driver', 'karyawan', 'truck'));
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
    public function store(DriverRequest $request)
    {
        $attr = $request->all();

        //insert into table
        Driver::create($attr);

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
        $driver = Driver::findOrFail($id);

        return response()->json($driver);
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
        //find or fail
        $driver = Driver::findOrFail($id);

        //update
        $driver->update($request->all());

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
        //delete
        Driver::destroy($id);

        //redirect
        return redirect()->back();
    }

    //createPDF
    public function createPDF()
    {
        //driver with karyawan and truck
        $driver = Driver::with('karyawan', 'truck')->get();
        return view('driver.pdf', compact('driver'));
    }
}
