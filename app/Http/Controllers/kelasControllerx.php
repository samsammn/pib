<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class kelasController extends Controller
{
    public function data(){
        $kelas = DB::table('kelas')->where('tingkat', 'XII')->get();
 
        return view('kelas.kelas',['kelas' => $kelas]);
        return view('kelas.kelas')->with('kelas', $kelas);
    }

    public function siswa($id){
        $siswa=DB::table('siswas')->where('kelas_id', $id)->first();
        return $siswa;
        
      }
}
