<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Guru;
use App\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = User::get();
        $guru = Guru::get();
        $role = Role::get();
        return view('user.index', ['user' => $user, 'guru' => $guru, 'role' => $role ])->with('active', 'active');
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
            'id_guru' => $request->user_nama,
            'username' => $request->user_username,
            'password' => bcrypt($request->user_password),
            'id_role' => $request->user_role,
        ];
        User::create($data);
        return redirect('/user')->with('insert', 'Data User Berhasil Ditambahkan');
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = [
            'id_guru' => $request->edit_user_nama,
            'username' => $request->edit_user_username,
            'password' => bcrypt($request->edit_user_password),
            'id_role' => $request->edit_user_role,
        ];
        try {
            User::where('id_user', $id)->update($data);
        } catch (\Exception $e) {
            return back()->withError($e->getMessage())->withInput();
        }
        return redirect('/user')->with('update', 'Data Berhasil Diubah');
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
        try {
            $selectedUser = User::findOrFail($id);
            if ($selectedUser) {
                
                $selectedUser->delete();
                return redirect('/user')->with('delete', 'Data Berhasil Dihapus');
           
            }
        } catch (\Exception $e) {
            return back()->withError($e->getMessage())->withInput();
        }
    }
}
