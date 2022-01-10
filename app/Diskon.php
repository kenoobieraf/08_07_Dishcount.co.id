<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diskon extends Model
{
    protected $primaryKey = 'id_diskon';
    //deklarasikan nama tabel di db
    protected $table = 'diskon';
    //deklarasi field yang bisa diisi pada table
    protected $fillable = [
        'id_kategori_diskon',
        'nama_diskon',
        'deskripsi',
        'gambar_diskon'];


    public function kategori()
    {
        return $this->belongsTo('App\KategoriDiskon', 'id_kategori_diskon', 'id_kategori_diskon');
    }
    public function lokasi()
    {
        return $this->hasMany('App\LokasiDiskon', 'id_diskon', 'id_diskon');
    }
    public function review()
    {
        return $this->hasMany('App\ReviewDiskon', 'id_diskon', 'id_diskon');
    }
    public function klaim_diskon()
    {
        return $this->hasMany('App\KlaimDiskon', 'id_diskon', 'id_diskon');
    }
}
