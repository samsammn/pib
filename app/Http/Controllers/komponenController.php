<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class komponenController extends Controller
{
    public function data()
    {
        $komponen = DB::table('komponens')->get();
 
        return view('komponen.komponen',['komponen' => $komponen]);
        return view('komponen.komponen')->with('komponen', $komponen);
    }

    public function add(){
      return view('komponen.add');
    }

    public function addProcess(Request $request){
      $request->validate([
      'nama_komponen' => 'required|min:3',
      ],[
        'nama_komponen.required' => 'Nama Komponen tidak boleh kosong'
      ]);

      DB::table('komponens')->insert([

        'nama_komponen' => $request->nama_komponen
    ]);
        return redirect('komponen')->with('status','Komponen berhasil ditambah!');
    }

    public function edit($id){
      $komponen=DB::table('komponens')->where('id', $id)->first();
      return view('komponen/edit', compact('komponen'));
      
    }

    public function editProcess(Request $request, $id){
      DB::table('komponens')->where('id', $id)
      ->update([
        'nama_komponen' => $request->nama_komponen
      ]);
      return redirect('komponen')->with('status','Komponen berhasil diubah!');
    }

    public function delete($id){
      DB::table('komponens')->where('id', $id)->delete();
      return redirect('komponen')->with('status','Komponen berhasil dihapus!');
    }
    














    
}
