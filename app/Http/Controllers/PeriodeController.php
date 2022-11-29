<?php

namespace App\Http\Controllers;

use App\Models\Periode;
use Illuminate\Http\Request;

class PeriodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menuju index periode
        $periode = Periode::get();
        return view('periode.index', ['periode' => $periode])->with('active', 'active');
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
     * @param  \App\Http\Requests\StorePeriodeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //tambah data periode keDB
        $data = [
            'periode_penilaian' => $request->periode_penilaian,
            'smt_periode' => $request->smt_periode,
            'sts_periode' => 1
        ];
        Periode::create($data);
        return redirect('/periode')->with('insert', 'Data Periode Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Periode  $periode
     * @return \Illuminate\Http\Response
     */
    public function show(Periode $periode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Periode  $periode
     * @return \Illuminate\Http\Response
     */
    public function edit(Periode $periode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePeriodeRequest  $request
     * @param  \App\Models\Periode  $periode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //update periode
        $data = [
            'periode_penilaian' => $request->periode_penilaian,
            'smt_periode' => $request->smt_periode
        ];

        Periode::where('id_periode', $id)->update($data);
        return redirect('/periode')->with('update', 'Data Berhasil Dirubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Periode  $periode
     * @return \Illuminate\Http\Response
     */
    public function destroy(Periode $periode)
    {
        //
    }
}
