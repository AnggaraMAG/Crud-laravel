<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Crud;


class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Home';
        $crud_list = Crud::all();
        $jumlahData = $crud_list->count();
        return view('crud.index', compact('title', 'crud_list', 'jumlahData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Menambah Data';
        return view('crud.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'nisn' => 'required|size:5|unique:crud,nisn',
            'nama' => 'required|string|max:30',
            'tanggal_lahir' => 'required|date',
            'umur' => 'required|size:2'
        ]);
        $input = $request->all();
        Crud::create($input);
        return redirect('/crud')->with('status', 'Data Berhasil Ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Detail Siswa';
        $detail = Crud::findOrFail($id);
        return view('crud.detail', compact('title', 'detail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Edit Data Siswa';
        $edit = Crud::findOrFail($id);
        return view('crud.edit', compact('title', 'edit'));
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
            'nisn' => 'required|size:5|unique:crud,nisn,' . $id,
            'nama' => 'required|string|max:30',
            'tanggal_lahir' => 'required|date',
            'umur' => 'required'
        ]);
        $data_siswa = Crud::findOrFail($id);
        $data_siswa->update($request->all());
        return redirect('/crud')->with('status', 'Data Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa = Crud::findOrFail($id);
        $siswa->delete();
        return redirect('/crud')->with('status', 'Data Berhasil Dihapus!');
    }
}
