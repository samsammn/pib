<?php

namespace App\Http\Controllers;

use App\Penilaian;
use App\Komponen;
use App\Subkomponen;
use App\Siswa;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
       
        //return $subkomponens;
        return view('penilaian/penilaian', compact('penilaians'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siswas = Siswa::all();
        $komponens = Komponen::all();
        $subkomponens = Subkomponen::all();
        return view('penilaian.create', compact('siswas', 'komponens','subkomponens'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $penilaian = new Penilaian;
        $penilaian->id = $request->id;
        $penilaian->nisn = $request->nisn;
        $penilaian->komponen_id = $request->komponen_id;
        $penilaian->subkomponen_id = $request->subkomponen_id;
        $penilaian->nilai = $request->nilai;
        $penilaian->save();
        return redirect('penilaians')->with('status','Sub Komponen berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Penilaian  $penilaian
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswas = Siswa::where('nisn', $id)->get();
       //$siswas = Siswa::all();
       //return $siswas;
       $komponens = Komponen::all();
       $subkomponens = Subkomponen::all();
        return view ('penilaian/penilaians', compact('siswas','subkomponens','komponens'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Penilaian  $penilaian
     * @return \Illuminate\Http\Response
     */
    public function edit(Penilaian $penilaian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Penilaian  $penilaian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penilaian $penilaian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Penilaian  $penilaian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penilaian $penilaian)
    {
        //
    }
}
