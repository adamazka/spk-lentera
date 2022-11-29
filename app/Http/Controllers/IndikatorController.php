<?php

namespace App\Http\Controllers;

use App\Models\Indikator;
use App\Http\Requests\StoreIndikatorRequest;
use App\Http\Requests\UpdateIndikatorRequest;
use App\Models\Kriteria;

class IndikatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreIndikatorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIndikatorRequest $request)
    {
        //
        $data = [
            'id_kriteria' => $request->tambah_id_kriteria,
            'nama_indikator' => $request->nama_indikator
        ];
        Indikator::create($data);
        return redirect('/kriteria')->with('insert', 'Data Indikator Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Indikator  $indikator
     * @return \Illuminate\Http\Response
     */
    public function show(Indikator $indikator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Indikator  $indikator
     * @return \Illuminate\Http\Response
     */
    public function edit(Indikator $indikator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateIndikatorRequest  $request
     * @param  \App\Models\Indikator  $indikator
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIndikatorRequest $request, $id)
    {
        //
        $data = [
            'id_kriteria' => $request->ubah_id_kriteria,
            'nama_indikator' => $request->nama_indikator
        ];

        Indikator::where('id_indikator', $id)->update($data);
        return redirect('/kriteria')->with('update', 'Indikator Berhasil Dirubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Indikator  $indikator
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $indikator = Indikator::findOrFail($id);
        $indikator->delete($indikator);

        return redirect('/kriteria')->with('delete', 'Indikator Berhasil Dihapus');
    }
}
