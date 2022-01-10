<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LokasiDiskon extends Model
{
    protected $primaryKey = 'id_lokasi_diskon';
    //deklarasikan nama tabel di db
    protected $table = 'lokasi_diskon';
    //deklarasi field yang bisa diisi pada table
    protected $fillable = [
        'id_diskon',
        'nama_kota'];

    public function diskon()
    {
        return $this->belongsTo('App\Diskon', 'id_diskon', 'id_diskon');
    }
}
