<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRealRequest;
use App\Models\Customer;
use App\Models\OrderReal;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderRealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all
        $orderreal = OrderReal::all();
        $customer = Customer::all();
        return view('order_real.index', compact('orderreal', 'customer'));
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
    public function store(OrderRealRequest $request)
    {
        //request all
        $attr = $request->all();

        //insert into table
        OrderReal::create($attr);

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
        $orderreal = OrderReal::findOrFail($id);

        //return response
        return response()->json($orderreal);
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
        //validate
        $request->validate([
            'customer_id' => 'required',
            'alamat' => 'required',
            'receive_po' => 'required',
            'realisasi' => 'required',
            'unreal' => 'required',
            'keterangan' => 'required',
        ]);

        //find or fail
        $orderreal = OrderReal::findOrFail($id);

        //update
        $orderreal->update($request->all());

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
        OrderReal::destroy($id);

        //redirect
        return redirect()->back();
    }

    public function createPDF(Request $request)
    {
        $from_date = Carbon::parse($request->from_date)
                             ->toDateTimeString();

       $to_date = Carbon::parse($request->to_date)
                             ->toDateTimeString();
        

        $orderreal = OrderReal::with('customer')->whereBetween('created_at',[$from_date,$to_date])->get();
        $sum_receive_po = OrderReal::whereBetween('created_at',[$from_date,$to_date])->sum('receive_po');
        $sum_realisasi = OrderReal::whereBetween('created_at',[$from_date,$to_date])->sum('realisasi');
        $sum_unreal = OrderReal::whereBetween('created_at',[$from_date,$to_date])->sum('unreal');

        return view('order_real.pdf', compact('orderreal', 'sum_receive_po', 'sum_realisasi', 'sum_unreal'));
    }
}
