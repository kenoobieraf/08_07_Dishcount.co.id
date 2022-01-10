<?php

namespace App\Http\Controllers;

use App\KategoriDiskon;
use Illuminate\Http\Request;

class KategoriDiskonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = KategoriDiskon::all();

        return view('admin.kategori_diskon.index',['kategori' => $kategori]);
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
        KategoriDiskon::create($request->all());

        return back()->with('success','Berhasil menambahkan data kategori diskon baru!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\KategoriDiskon  $kategoriDiskon
     * @return \Illuminate\Http\Response
     */
    public function show(KategoriDiskon $kategoriDiskon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\KategoriDiskon  $kategoriDiskon
     * @return \Illuminate\Http\Response
     */
    public function edit(KategoriDiskon $kategoriDiskon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\KategoriDiskon  $kategoriDiskon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        KategoriDiskon::find($request->id_kategori_diskon)->update($request->all());

        return back()->with('success','Berhasil mengubah data kategori diskon!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\KategoriDiskon  $kategoriDiskon
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        KategoriDiskon::find($id)->delete();

        return back()->with('success','Berhasil menghapus data kategori diskon!');
    }

    public function list_diskon()
    {
        return view('user.kategori.list_kategori',[
            'kategori_diskon' => KategoriDiskon::all()
        ]);
    }
}
