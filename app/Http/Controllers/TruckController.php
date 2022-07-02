<?php

namespace App\Http\Controllers;

use App\Http\Requests\TruckRequest;
use App\Models\Truck;
use Illuminate\Http\Request;

class TruckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all
        $truck = Truck::all();
        return view('truck.index', compact('truck'));
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
    public function store(TruckRequest $request)
    {
        //all
        $attr = $request->all();

        //insert into table
        Truck::create($attr);

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
    public function edit(Truck $truck, Request $request)
    {
        // $truck = Truck::findOrFail($truck->id);
        // return view('truck.edit', compact('truck'));
        if ($request->ajax()) {
            return response()->json($truck);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TruckRequest $request, Truck $truck)
    {
        //all
        $attr = $request->all();

        //update
        $truck->update($attr);

        //redirect
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Truck $truck)
    {
        //findorfail
        $truck = Truck::findOrFail($truck->id);
        //delete
        $truck->delete();
        //redirect
        return redirect()->back();
    }
}
