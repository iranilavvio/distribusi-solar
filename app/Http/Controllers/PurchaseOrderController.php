<?php

namespace App\Http\Controllers;

use App\Http\Requests\PurchaseOrderRequest;
use App\Models\Customer;
use App\Models\Karyawan;
use App\Models\PurchaseOrder;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PurchaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $params = $request->except('_token');   
        $purchase = PurchaseOrder::filter($params)->latest()->paginate($params['show'] ?? 10);
        $customer = Customer::all();
        $karyawan = Karyawan::where('posisi', 'Karyawan')->get();
        return view('purchase_order.index', compact('purchase', 'customer', 'karyawan'));
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
    public function store(PurchaseOrderRequest $request)
    {
        $attr = $request->all();

        PurchaseOrder::create($attr);

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
        $purchase = PurchaseOrder::findOrFail($id);
        
        return response()->json($purchase);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PurchaseOrderRequest $request, $id)
    {
        //find or fail
        $purchase = PurchaseOrder::findOrFail($id);

        $purchase->update($request->all());

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
        $purchase = PurchaseOrder::findOrFail($id);
        $purchase->delete();
        return redirect()->back();
    }
    
    public function createPDF(Request $request)
    {
        $from_date = Carbon::parse($request->from_date)->toDateTimeString();

        $to_date = Carbon::parse($request->to_date)->toDateTimeString();
        //purchase with customer and karyawan
        $purchase = PurchaseOrder::with('customer', 'karyawan')->whereBetween('tanggal', [$from_date, $to_date])->get();
        //return view
        return view('purchase_order.pdf', compact('purchase'));
    }
}
