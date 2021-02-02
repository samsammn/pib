<?php

namespace App\Http\Controllers;

use App\Subkomponen;
use App\Komponen;
use Illuminate\Http\Request;

class SubkomponenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$subkomponens = Komponen::where('komponen_id', $id)->get();
        $subkomponens = Subkomponen::all();
        //return $subkomponens;
        //return view('subkomponen/create', compact('subkomponens'));
        return view('subkomponen/index', compact('subkomponens'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $komponens = Komponen::all();
        return view('subkomponen.create', compact('komponens'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'subkomponen' => 'required|min:3',
           
            ],[
              'subkomponen.required' => 'Nama Sub Komponen tidak boleh kosong'
            ]);
        $subkomponen = new Subkomponen;
        $subkomponen->komponen_id = $request->komponen_id;
        $subkomponen->subkomponen = $request->subkomponen;
        $subkomponen->save();
       
        return redirect('subkomponens')->with('status','Sub Komponen berhasil ditambah!');
              
              
      
     }    
    
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Subkomponen  $subkomponen
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subkomponens = Subkomponen::where('komponen_id', $id)->get();
       
        return view ('subkomponen/subperkomponen', compact('subkomponens'));        
        //$siswas = Siswa::where('kelas_id', $id)->get();
        //return view ('siswa/siswaperkelas', compact('siswas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subkomponen  $subkomponen
     * @return \Illuminate\Http\Response
     */
    public function edit(Subkomponen $subkomponen)
    {
        return view('subkomponen.edit', compact('subkomponen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subkomponen  $subkomponen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subkomponen $subkomponen)
    {
        subkomponen::where('id', $subkomponen->id)
            ->update([
                'subkomponen' => $request->subkomponen

            ]);
        return redirect('/subkomponens')->with('status','Sub Komponen berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subkomponen  $subkomponen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subkomponen $subkomponen)
    {
        Subkomponen::destroy($subkomponen->id);
        return redirect('/subkomponens')->with('status','Sub Komponen berhasil dihapus!');
    }
}
