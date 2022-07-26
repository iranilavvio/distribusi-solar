<?php

namespace App\Http\Controllers;

use App\Models\Kepangkatan;
use Illuminate\Http\Request;

class KepangkatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kepangkatan = Kepangkatan::all();
        return view('kepangkatan.index', compact('kepangkatan'));
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
        //validate
        $request->validate([
            'nama_pegawai' => 'required|string|max:255',
            'nip' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_telp' => 'required|string|max:255',
            'email' => 'required|string|max:255',
        ]);

        //create
        $kepangkatan = Kepangkatan::create($request->all());
        return redirect()->route('kepangkatan.index')->with('status', 'Data berhasil ditambahkan');
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
        $kepangkatan = Kepangkatan::findOrFail($id);
        //return response json
        return response()->json($kepangkatan);
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
            'nama_pegawai' => 'required|string|max:255',
            'nip' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_telp' => 'required|string|max:255',
            'email' => 'required|string|max:255',
        ]);
        //find or fail
        $kepangkatan = Kepangkatan::findOrFail($id);
        //update
        $kepangkatan->update($request->all());
        //return redirect
        return redirect()->route('kepangkatan.index')->with('status', 'Data berhasil diubah');
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
        $kepangkatan = Kepangkatan::findOrFail($id);
        $kepangkatan->delete();
        //return redirect
        return redirect()->route('kepangkatan.index')->with('status', 'Data berhasil dihapus');
    }

    //kepangkatan
    public function createPDF()
    {
        //
        $kepangkatan = Kepangkatan::all();
        return view('kepangkatan.pdf', compact('kepangkatan'));
    }
}
