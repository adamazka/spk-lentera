<?php

namespace App\Http\Controllers;

use App\Models\Inputnilai;
use App\Models\Periode;
use App\Models\Guru;
use App\Models\Kriteria;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class InputnilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $inputnilai = Inputnilai::get();
        $guru = Guru::get();
        $periode = Periode::get();
        return view('inputnilai.index', ['inputnilai' => $inputnilai, 'guru' => $guru, 'periode' => $periode,])->with('active', 'active');
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
        $input = $request->all();

        Inputnilai::create($input);

        // return response()->json(['success' => 'Berhasil Menyimpan Data']);
        return redirect()->back()->with('insert', 'data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inputnilai  $inputnilai
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $guru = Guru::findOrFail($id);
        $periode = Periode::all();
        $kriteria = Kriteria::all();
        return view('inputnilai.pilkriteria', compact('guru', 'periode', 'kriteria'))->with('active', 'active');;
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inputnilai  $inputnilai
     * @return \Illuminate\Http\Response
     */
    // SETELAH PILIH PERIODE DAN GURU, MAKA AKAN MENAMPILKAN PILIH KATEGORI
    public function edit($guru, $periode)
    {
        // $guru = Guru::where('nama_guru', $id)->firstOrFail();
        $guru = Guru::findOrFail($guru);
        $periode = Periode::where('id_periode', $periode)->get();
        $kriteria = Kriteria::all();
        // dd($periode);
        return view('inputnilai.pilkriteria', compact('guru', 'periode', 'kriteria'))->with('active', 'active');;
    }

    // SETELAH PILIH KRITERIA TAMPIL PILIH JAWABAN
    public function pilih_kriteria ($guru, $periode, $kriteria)
    {
        $kriteria = Kriteria::findOrFail($kriteria);
        $guru = Guru::where('id_guru', $guru)->get();
        $periode = Periode::where('id_periode', $periode)->get();
        $pertanyaan = Pertanyaan::where('id_kriteria', $kriteria->id_kriteria)->get();
        // $pertanyaan = Pertanyaan::where('id_kriteria', $kriteria)->get();
        return view('inputnilai.piljawaban', compact('guru', 'periode', 'kriteria', 'pertanyaan'))->with('active', 'active');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inputnilai  $inputnilai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inputnilai $inputnilai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inputnilai  $inputnilai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inputnilai $inputnilai)
    {
        //
    }
}
