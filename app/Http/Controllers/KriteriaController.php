<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Http\Requests\StoreKriteriaRequest;
use App\Http\Requests\UpdateKriteriaRequest;
use App\Models\Indikator;
use App\Models\Pertanyaan;
use Illuminate\Support\Facades\DB;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //tampil menu kriteria
        $pertanyaan = Pertanyaan::get();
        $indikator = Indikator::get();
        $kriteria = Kriteria::get();

        // $current_option = Kriteria::all()->nama_kriteria;
        // $option = Kriteria::where('nama_kriteria', '!=', $current_option)->groupBy('nama_kriteria')->get();

        return view('kriteria.index', ['kriteria' => $kriteria, 'indikator' => $indikator, 'pertanyaan' => $pertanyaan,])->with('active', 'active');
    }

    // mengambil nama indikator by id kriteria
    public function GetIndikatorByKriteria($id_kriteria)
    {
        echo json_encode(DB::table('indikators')->where('id_kriteria', $id_kriteria)->get());
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
     * @param  \App\Http\Requests\StoreKriteriaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKriteriaRequest $request)
    {
        //
        try {
            $data = [
                'nama_kriteria' => $request->nama_kriteria,
                'bobot_kriteria' => $request->bobot_kriteria
            ];
            Kriteria::create($data);
        } catch (\Exception $e) {
            return back()->withError('error insert kriteria')->withInput();
        }
        return redirect('/kriteria')->with('insert', 'Kriteria Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function show(Kriteria $kriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function edit(Kriteria $kriteria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKriteriaRequest  $request
     * @param  \App\Models\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKriteriaRequest $request, $id)
    {
        //
        $data = [
            'nama_kriteria' => $request->nama_kriteria,
            'bobot_kriteria' => $request->bobot_kriteria
        ];

        Kriteria::where('id_kriteria', $id)->update($data);
        return redirect('/kriteria')->with('update', 'Kriteria Berhasil Dirubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $kriteria = Kriteria::findOrFail($id);
        $kriteria->delete($kriteria);

        return redirect('/kriteria')->with('delete', 'Kriteria Berhasil Dihapus');
    }
}
