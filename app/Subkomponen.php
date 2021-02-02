<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subkomponen extends Model
{
    public function komponen()
    {
        return $this->belongsTo('App\Komponen');
    }
    public function penilaian()
    {
        return $this->belongsTo('App\Penilaian');
    }
}
