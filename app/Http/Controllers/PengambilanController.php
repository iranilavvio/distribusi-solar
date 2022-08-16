<?php

namespace App\Http\Controllers;

use App\Models\Pengambilan;
use Illuminate\Http\Request;

class PengambilanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //all
        $pengambilan = Pengambilan::all();
        return view('pengambilan.index', compact('pengambilan'));
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
    public function store(Request $request)
    {
        //validation
        $this->validate($request, [
            'bbm' => 'required',
            'nopol' => 'required',
            'driver' => 'required',
            'volume' => 'required',
        ]);

        //insert into table
        Pengambilan::create($request->all());

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
        $pengambilan = Pengambilan::findOrFail($id);

        return response()->json($pengambilan);
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
        $this->validate($request, [
            'bbm' => 'required',
            'nopol' => 'required',
            'driver' => 'required',
            'volume' => 'required',
        ]);

        $pengambilan = Pengambilan::findOrFail($id);

        $pengambilan->update($request->all());

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
        Pengambilan::destroy($id);
        return redirect()->back();
    }
}
