<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $guru = Guru::get();
        return view('guru.index', ['guru' => $guru])->with('active', 'active');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('guru.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $data = [
                'nama_guru' => $request->nama_guru,
                'alamat_guru' => $request->alamat_guru,
                'tahun_masuk' => $request->tahun_masuk,
                'tahun_keluar' => $request->tahun_keluar,
                'tlp_guru' => $request->tlp_guru,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'no_ktp_guru' => $request->no_ktp_guru,
                'no_kk_guru' => $request->no_kk_guru,
                'pen_akhir_guru' => $request->pen_akhir_guru,
                'jabatan_guru' => $request->jabatan_guru,
                'status_aktif_guru' => 1
            ];
            Guru::create($data);
        } catch (\Exception $e) {
            return back()->withError('error insert guru')->withInput();
        }
        return redirect('/guru')->with('insert', 'Data Berhasil Ditambahkan');
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
    public function edit($nama_guru)
    {
        //menampilkan menu edit data guru
        $guru = Guru::where('nama_guru', $nama_guru)->firstOrFail();
        return view('guru.edit', compact('guru'));
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
        //mengupdate data guru
        $data = [
            'nama_guru' => $request->nama_guru,
            'alamat_guru' => $request->alamat_guru,
            'tahun_masuk' => $request->tahun_masuk,
            'tahun_keluar' => $request->tahun_keluar,
            'tlp_guru' => $request->tlp_guru,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_ktp_guru' => $request->no_ktp_guru,
            'no_kk_guru' => $request->no_kk_guru,
            'pen_akhir_guru' => $request->pen_akhir_guru,
            'jabatan_guru' => $request->jabatan_guru,
            'status_aktif_guru' => 1
        ];
        try {
            Guru::where('id_guru', $id)->update($data);
        } catch (\Exception $e) {
            return back()->withError($e->getMessage())->withInput();
        }
        return redirect('/guru')->with('update', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //untuk hapus data
        try {

            $selectedGuru = Guru::findOrFail($id);

            if ($selectedGuru) {
                
                $selectedGuru->delete();

                return redirect('/guru')->with('delete', 'Data Berhasil Dihapus');
            }
        } catch (\Exception $e) {
            return back()->withError($e->getMessage())->withInput();
        }
    }
}
