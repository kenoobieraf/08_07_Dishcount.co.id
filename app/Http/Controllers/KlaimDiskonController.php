<?php

namespace App\Http\Controllers;

use App\KlaimDiskon;
use Illuminate\Http\Request;

class KlaimDiskonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $klaim = KlaimDiskon::orderBy('created_at','desc')->get();

        return view('admin.diskon.klaim',[
            'klaim' => $klaim
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
        KlaimDiskon::create($request->all());

        return back()->with('success','Berhasil klaim diskon!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\KlaimDiskon  $klaimDiskon
     * @return \Illuminate\Http\Response
     */
    public function show(KlaimDiskon $klaimDiskon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\KlaimDiskon  $klaimDiskon
     * @return \Illuminate\Http\Response
     */
    public function edit(KlaimDiskon $klaimDiskon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\KlaimDiskon  $klaimDiskon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KlaimDiskon $klaimDiskon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\KlaimDiskon  $klaimDiskon
     * @return \Illuminate\Http\Response
     */
    public function destroy(KlaimDiskon $klaimDiskon)
    {
        //
    }
}
