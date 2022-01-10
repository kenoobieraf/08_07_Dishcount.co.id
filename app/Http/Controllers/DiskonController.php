<?php

namespace App\Http\Controllers;

use App\Diskon;
use App\KategoriDiskon;
use App\ReviewDiskon;
use Illuminate\Http\Request;


class DiskonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diskon = Diskon::all();
        $kategori = KategoriDiskon::all();

        return view('admin.diskon.index',[
            'diskon' => $diskon,
            'kategori' => $kategori
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
        request()->validate([
            'file' => 'required|mimes:jpeg,jpg,png|max:5120'
        ],
        [
            'file.max' => 'File gambar maksimal berukuran 5MB!',
            'file.mimes' => 'File gambar harus berekstensi jpg,jpeg,png!'
        ]);

        if($request->hasfile('file')) {
            $file = $request->file('file');
            $diskon = new Diskon();
            $diskon->id_kategori_diskon = $request->id_kategori_diskon;
            $diskon->nama_diskon = $request->nama_diskon;
            if(isset($request->deskripsi)) $diskon->deskripsi = $request->deskripsi;
            $diskon->save();
            $id = $diskon->id_diskon;

            $fileName = 'Diskon'.$id.'_'.time().rand(0, 1000).pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $fileName = $fileName.'.'.$file->getClientOriginalExtension();

            $diskon->gambar_diskon = 'diskon/'.$fileName;
            $diskon->save();
            $path = $file->storeAs('public/diskon',$fileName);
        }

        return back()->with('success','Berhasil menambahkan diskon!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Diskon  $diskon
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $diskon = Diskon::find($id);
        $diskon_top_4 = Diskon::orderBy('id_diskon','desc')->limit(4)->get();

        return view('user.diskon.detail',[
            'diskon' => $diskon,
            'diskon_top_4' => $diskon_top_4
        ]);
    }

    public function list_diskon($id = null)
    {
        if(!$id){
            $kategori = null;
            $diskon = Diskon::orderBy('id_diskon','desc')->get();
        }elseif($id=='top'){
            $kategori = 'top';
            $diskon = Diskon::withCount('klaim_diskon')->orderBy('klaim_diskon_count','desc')->limit(4)->get();
        }else{
            $kategori = KategoriDiskon::find($id);
            $diskon = Diskon::where('id_kategori_diskon',$id)->orderBy('id_diskon','desc')->get();
        }

        return view('user.diskon.list_diskon',[
            'diskon' => $diskon,
            'kategori' => $kategori
        ]);

    }

    public function search_diskon(Request $request)
    {
        $keyword = $request->id;
        $kategori = 'search';
        $diskon = Diskon::where('nama_diskon','LIKE',"%$keyword%")->get();
        return view('user.diskon.list_diskon',[
            'diskon' => $diskon,
            'kategori' => $kategori
        ]);
    }

    public function lokasi_diskon()
    {
        $kategori = 'lokasi';
        $member = auth()->user()->membership;
        $diskon = Diskon::whereHas('lokasi', function($k) use ($member){
            $k->where('nama_kota',$member->kota);
        })->get();
        return view('user.diskon.list_diskon',[
            'diskon' => $diskon,
            'kategori' => $kategori
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Diskon  $diskon
     * @return \Illuminate\Http\Response
     */
    public function edit(Diskon $diskon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Diskon  $diskon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id_diskon;
        if (isset($request->file)) {
            // dd("masuk sini bang");
            request()->validate([
                'file' => 'required|mimes:jpeg,jpg,png|max:5120'
            ],
            [
                'file.max' => 'File gambar maksimal berukuran 5MB!',
                'file.mimes' => 'File gambar harus berekstensi jpg,jpeg,png!'
            ]);

            if($request->hasfile('file')) {
                $file = $request->file('file');
                $fileName = 'Diskon'.$id.'_'.time().rand(0, 1000).pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $fileName = $fileName.'.'.$file->getClientOriginalExtension();

                $cariFile = Diskon::find($id);
                unlink(storage_path('app/public/'.$cariFile->gambar_diskon));

                Diskon::find($id)->update([
                    'id_kategori_diskon' => $request->id_kategori_diskon,
                    'nama_diskon' => $request->nama_diskon,
                    'deskripsi' => $request->deskripsi,
                    'gambar_diskon' => 'diskon/'.$fileName
                ]);
                $path = $file->storeAs('public/diskon',$fileName);

            }
        }else{
            Diskon::find($id)->update([
                'id_kategori_diskon' => $request->id_kategori_diskon,
                'nama_diskon' => $request->nama_diskon,
                'deskripsi' => $request->deskripsi,
            ]);
        }
        return back()->with('success','Berhasil mengubah data diskon!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Diskon  $diskon
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cariFile = Diskon::find($id);
        unlink(storage_path('app/public/'.$cariFile->gambar_diskon));

        $cariFile->delete();

        return back()->with('success','Berhasil menghapus data diskon!');
    }

    public function review($id)
    {
        $diskon = Diskon::find($id);
        $review = ReviewDiskon::where('id_diskon',$id)->get();
        return view('admin.diskon.review',[
            'diskon' => $diskon,
            'review' => $review
        ]);
    }
}
