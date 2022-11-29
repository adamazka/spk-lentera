<?php

namespace App\Http\Controllers;
use App\Models\Ketnilai;
use Illuminate\Http\Request;

class KetnilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ketnilai = Ketnilai::get();
        return view('ketnilai.index', ['ketnilai' => $ketnilai])->with('active', 'active');
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
            'nama_ketnilai' => $request->nama_ketnilai,
            'besaran_ketnilai' => $request->besaran_ketnilai,
            'nilai_ketnilai' => $request->nilai_ketnilai
        ];
        Ketnilai::create($data);
        return redirect('/ketnilai')->with('insert', 'Data Keterangan Nilai Berhasil Ditambahkan');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = [
            'nama_ketnilai' => $request->nama_ketnilai,
            'besaran_ketnilai' => $request->besaran_ketnilai,
            'nilai_ketnilai' => $request->nilai_ketnilai
        ];
        Ketnilai::where('id_ketnilai', $id)->update($data);
        return redirect('/ketnilai')->with('update', 'Data Keterangan Nilai Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $ketnilai = Ketnilai::findOrFail($id);
        $ketnilai->delete($ketnilai);

        return redirect('/ketnilai')->with('delete', 'Data Keterangan Nilai Berhasil Dihapus');
    }
}
