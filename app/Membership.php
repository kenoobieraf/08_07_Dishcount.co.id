<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    protected $primaryKey = 'id_membership';
    //deklarasikan nama tabel di db
    protected $table = 'membership';
    //deklarasi field yang bisa diisi pada table
    protected $fillable = [
        'id_user',
        'nama_lengkap',
        'no_telp',
        'alamat',
        'kota'];


    public function user()
    {
        return $this->belongsTo('App\User', 'id_user', 'id');
    }
    public function review()
    {
        return $this->hasMany('App\ReviewDiskon', 'id_membership', 'id_membership');
    }
    public function klaim_diskon()
    {
        return $this->hasMany('App\KlaimDiskon', 'id_membership', 'id_membership');
    }
}
