<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    protected $fillable = [
        'nisn',
        'komponen_id',
        'subkomponen_id',
        'nilai'
    ];

    public function siswa()
    {
        return $this->belongsTo('App\Siswa');
    }

    public function subkomponen()
    {

        return $this->belongsTo('App\Subkomponen');
    }

    public function komponen()
    {

        return $this->belongsTo('App\Komponen');
    }
}
