<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $params = $request->except('_token');   
        $customer = Customer::filter($params)->latest()->paginate($params['show'] ?? 10);
        // $karyawan = Karyawan::all();
        return view('customer.index', compact('customer'));
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
    public function store(CustomerRequest $request)
    {
        $request->validate([
            'kode' => 'required',
            'name' => 'required',
            'alamat' => 'required',
            'nama_contact' => 'required',
            'nomor_contact' => 'required',
        ]);
        $attr = $request->all();
        Customer::create($attr);
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        // if($customer) {
        //     return response()->json(['status' => 'success', 'data' => $customer]);
        // }
        // else {
        //     return response()->json(['status' => 'failed', 'message' => 'No data found']);
        // }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);

        return response()->json($customer);
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
        $request->validate([
            'kode' => 'required',
            'name' => 'required',
            'alamat' => 'required',
            'nama_contact' => 'required',
            'nomor_contact' => 'required',
        ]);
        $attr = $request->all();

        $customer = Customer::find($id);

        $customer->update($attr);

        //redirect
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        // $customer->delete();
        // return redirect()->back();

        $customer->delete();
        return redirect()->back();
    }
}
