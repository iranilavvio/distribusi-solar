<?php

namespace App\Http\Controllers;

use App\Http\Requests\TandaTerimaRequest;
use App\Models\SuratJalan;
use App\Models\TandaTerima;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TandaTerimaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tandaterima = TandaTerima::all();
        $suratjalan = SuratJalan::all();
        return view('tanda_terima.index', compact('tandaterima', 'suratjalan'));
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
    public function store(TandaTerimaRequest $request)
    {
        $attr = $request->all();

        TandaTerima::create($attr);
        
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
        $tandaterima = TandaTerima::findOrFail($id);

        return response()->json($tandaterima);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TandaTerimaRequest $request, $id)
    {
        $tandaterima = TandaTerima::findOrFail($id);
        
        $attr = $request->all();

        $tandaterima->update($attr);

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
        $tandaterima = TandaTerima::findOrFail($id);
        $tandaterima->delete();

        return redirect()->back();
    }

    public function createPDF()
    {
        //tandaterima where date = today
        // $tandaterima = TandaTerima::whereDate('created_at', Carbon::today())->get();
        $tandaterima = TandaTerima::with('suratjalan')->get();

        return view('tanda_terima.pdf', compact('tandaterima'));
    }
}
