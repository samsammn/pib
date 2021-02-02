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
       //return Penilaian::all();
       $penilaians = Penilaian::all();
       return view('penilaian/index', compact('penilaians'));
    
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
       // return $request->all();
       $penilaians = Penilaian::where('nisn', '=' ,$request->nisn);
       //if($penilaians->count() > 0 ){
       //    $penilaians->delete();
       //} 
        for($i=0; $i<count($request->nilai);$i++){
            $penilaian = new Penilaian;
            $penilaian->nisn = $request->nisn;
            $penilaian->komponen_id = $request->komponen_id[$i];
            $penilaian->subkomponen_id = $request->subkomponen_id[$i];
            $penilaian->nilai = $request->nilai[$i]; 
            $penilaian->save();
            
        }

       return redirect('penilaians/'.$request->nisn)->with('status','Sub penilaian berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Penilaian  $penilaian
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswa = Siswa::where('nisn', $id)->first();
        //if($siswa != null){
          //   return response()->json($siswa->nama_siswa);
        //}
       
       //$siswas = Siswa::all();
       //return $siswas;
       $komponens = Komponen::all();
       
       $subkomponens = Subkomponen::with(['komponen'])->get();
       foreach($subkomponens as $sk){
           $p = Penilaian::where('nisn', '=', $id)->where('subkomponen_id', '=', $sk->id)->first();
           if($p != null ){
               $sk->penilaian=$p->nilai;
               $sk->penilaian_id=$p->id;
           }
           else {
            $sk->penilaian=0;
            $sk->penilaian_id='';
           }
       }
      // return $subkomponens;
        return view ('penilaian/penilaians', compact('siswa','subkomponens','komponens'));
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
