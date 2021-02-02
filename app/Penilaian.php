<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
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
