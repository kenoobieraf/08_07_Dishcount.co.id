<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KlaimDiskon extends Model
{
    //deklarasikan nama tabel di db
    protected $table = 'klaim_diskon';
    //deklarasi field yang bisa diisi pada table
    protected $fillable = [
        'id_membership',
        'id_diskon'];

    public function diskon()
    {
        return $this->belongsTo('App\Diskon', 'id_diskon', 'id_diskon');
    }
    public function membership()
    {
        return $this->belongsTo('App\Membership', 'id_membership', 'id_membership');
    }
}
