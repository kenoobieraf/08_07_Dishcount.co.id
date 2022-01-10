<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriDiskon extends Model
{
    protected $primaryKey = 'id_kategori_diskon';
    //deklarasikan nama tabel di db
    protected $table = 'kategori_diskon';
    //deklarasi field yang bisa diisi pada table
    protected $fillable = [
        'nama_kategori'];

    public function diskon()
    {
        return $this->hasMany('App\Diskon', 'id_kategori_diskon', 'id_kategori_diskon');
    }
}
