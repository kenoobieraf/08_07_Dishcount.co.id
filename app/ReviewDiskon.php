<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReviewDiskon extends Model
{
    protected $primaryKey = 'id_review_diskon';
    //deklarasikan nama tabel di db
    protected $table = 'review_diskon';
    //deklarasi field yang bisa diisi pada table
    protected $fillable = [
        'id_diskon',
        'id_membership',
        'isi_review'];


    public function diskon()
    {
        return $this->belongsTo('App\Diskon', 'id_diskon', 'id_diskon');
    }
    public function membership()
    {
        return $this->belongsTo('App\Membership', 'id_membership', 'id_membership');
    }
}
