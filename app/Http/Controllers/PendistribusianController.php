<?php

namespace App\Http\Controllers;

use App\Http\Requests\PendistribusianRequest;
use App\Models\OrderReal;
use App\Models\Pendistribusian;
use App\Models\SuratJalan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PendistribusianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $params = $request->except('_token');   
        $distribusi = Pendistribusian::filter($params)->latest()->paginate($params['show'] ?? 10);
        $suratjalan = SuratJalan::all();
        $orderreal = OrderReal::all();
        return view('pendistribusian.index', compact('distribusi', 'suratjalan', 'orderreal'));
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
    public function store(PendistribusianRequest $request)
    {
        $attr = $request->all();

        Pendistribusian::create($attr);

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
        $distribusi = Pendistribusian::findOrFail($id);
        
        //return response json
        return response()->json($distribusi);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PendistribusianRequest $request, $id)
    {
        $attr = $request->all();

        $distribusi = Pendistribusian::findOrFail($id);

        $distribusi->update($attr);

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
        $distribusi = Pendistribusian::findOrFail($id);

        $distribusi->delete();

        return redirect()->back();
    }

    public function createPDF(Request $request)
    {
        $from_date = Carbon::parse($request->from_date)->toDateTimeString();

        $to_date = Carbon::parse($request->to_date)->toDateTimeString();
        
        $distribusi = Pendistribusian::with('orderreal', 'suratjalan')->whereBetween('created_at',[$from_date,$to_date])->get();

        return view('pendistribusian.pdf', compact('distribusi'));
    }
}
