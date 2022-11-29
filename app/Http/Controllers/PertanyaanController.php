<?php

namespace App\Http\Controllers;

use App\Models\Pertanyaan;
use App\Models\Indikator;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class PertanyaanController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = [
            'id_kriteria' => $request->pertanyaan_id_kriteria,
            'id_indikator' => $request->pertanyaan_id_indikator,
            'pertanyaan' => $request->pertanyaan
        ];

        Pertanyaan::create($data);
        return redirect('/kriteria')->with('insert', 'Data Pertanyaan Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pertanyaan  $pertanyaan
     * @return \Illuminate\Http\Response
     */
    public function show(Pertanyaan $pertanyaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pertanyaan  $pertanyaan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pertanyaan $pertanyaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pertanyaan  $pertanyaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = [
            'id_kriteria' => $request->ubah_pertanyaan_id_kriteria,
            'id_indikator' => $request->ubah_pertanyaan_id_indikator,
            'pertanyaan' => $request->pertanyaan
        ];

        Pertanyaan::where('id_pertanyaan', $id)->update($data);
        return redirect('/kriteria')->with('update', 'Pertanyaan Berhasil Dirubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pertanyaan  $pertanyaan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $pertanyaan = Pertanyaan::findOrFail($id);
        $pertanyaan->delete($pertanyaan);

        return redirect('/kriteria')->with('delete', 'Pertanyaan Berhasil Dihapus');
        // try {
        //     Pertanyaan::destroy($pertanyaan->id_pertanyaan);
        // } catch (\Exception $e) {
        //     return back()->withError($e->getMessage())->withInput();
        // }
        // return redirect('/kriteria')->with('delete', 'Pertanyaan Berhasil Dihapus');
    }
}
