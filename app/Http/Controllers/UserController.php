<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Registered;

use Illuminate\Http\Request;
use App\User;
use App\UserLevel;
use App\Diskon;
use App\KlaimDiskon;
use App\Membership;
use Illuminate\Support\Str;
use App\Http\Controllers\GetApiController;



class UserController extends Controller
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
    public function index()
    {
        $level = UserLevel::orderBy('id_level','desc')->get();
        $users = User::orderBy('id','desc')->get();

        return view('admin.user.index',['level' => $level, 'users' => $users]);
    }

    public function index_user()
    {
        $diskon_top_4 = Diskon::withCount('klaim_diskon')->orderBy('klaim_diskon_count','desc')->limit(4)->get();
        $diskon = Diskon::orderBy('id_diskon','desc')->limit(8)->get();

        return view('user.home',[
            'diskon' => $diskon,
            'diskon_top_4' => $diskon_top_4
        ]);
    }

    public function profil()
    {
        $membership = auth()->user()->membership;
        $klaim_diskon = KlaimDiskon::where('id_membership',$membership->id_membership)->get();
        $kota = $this->getApi->getKota();
        return view('user.profil',[
            'user' => auth()->user(),
            'klaim_diskon' => $klaim_diskon,
            'member' => $membership,
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
        if ($request->password != $request->confirm_password){
            return back()->with('error','Registrasi gagal! Password dan Konfirmasi Password tidak sama.');
        }

        $level = UserLevel::find($request->id_level);

        $user = new User();

        $user->name = $request->nama_lengkap;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->remember_token = Str::random(60);
        $user->id_level = $request->id_level;
        $user->save();

        if($level->deskripsi_level=='Pelanggan'){
            Membership::create([
                'id_user' => $user->id,
                'nama_lengkap' => $request->nama_lengkap,
                'no_telp' => $request->telp_user
            ]);
        }


        return back()->with('success','Selamat berhasil melakukan registrasi!');

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
    public function update_pass(Request $request)
    {
        if ($request->password != $request->confirm_password){
            return back()->with('error','Ubah Password gagal! Password dan Konfirmasi Password harus sama.');
        }
        User::find($request->id)->update(['password' => bcrypt($request->password)]);
        return back()->with('success','Berhasil mengubah password!');

    }

    public function update(Request $request)
    {

        User::find($request->id)->update([
            'name' => $request->nama_lengkap,
            'email' => $request->email,
        ]);
        $level = UserLevel::find($request->id_level);
        if ($level->deskripsi_level=='Pelanggan') {
            Membership::find($request->id_membership)->update([
                'nama_lengkap' => $request->nama_lengkap,
                'no_telp' => $request->no_telp,
                'alamat' => $request->alamat,
                'kota' => $request->kota
            ]);
        }

        return back()->with('success','Berhasil mengubah data user!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();

        return back()->with('success','Berhasil menghapus data user.');
    }

    public function verif($id)
    {
        $user = User::find($id);
        $user->email_verified_at = now();
        $user->save();

        return redirect('/login')->with('success','Akun anda telah terverifikasi! Akun telah bisa digunakan login.');

    }
}
