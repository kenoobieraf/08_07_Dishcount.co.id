<?php

namespace App\Http\Controllers;

use App\LokasiDiskon;
use App\Diskon;
use Illuminate\Http\Request;

use App\Http\Controllers\GetApiController;

class LokasiDiskonController extends Controller
{

    protected $getApi;
    public function __construct(GetApiController $getApi)
    {
        $this->getApi = $getApi;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $diskon = Diskon::find($id);
        $lokasi = LokasiDiskon::where('id_diskon',$id)->get();
        $kota = $this->getApi->getKota();

        return view('admin.lokasi.index',[
            'diskon' => $diskon,
            'lokasi' => $lokasi,
            'kota' => $kota['data']
        ]);
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
        LokasiDiskon::create($request->all());

        return back()->with('success','Berhasil menambahkan lokasi diskon!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LokasiDiskon  $lokasiDiskon
     * @return \Illuminate\Http\Response
     */
    public function show(LokasiDiskon $lokasiDiskon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LokasiDiskon  $lokasiDiskon
     * @return \Illuminate\Http\Response
     */
    public function edit(LokasiDiskon $lokasiDiskon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LokasiDiskon  $lokasiDiskon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        LokasiDiskon::find($request->id_lokasi_diskon)->update($request->all());

        return back()->with('success','Berhasil mengubah lokasi diskon!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LokasiDiskon  $lokasiDiskon
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        LokasiDiskon::find($id)->delete();

        return back()->with('success','Berhasil menghapus lokasi diskon!');
    }
}
