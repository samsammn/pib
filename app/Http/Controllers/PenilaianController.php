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
        return view('penilaian.create', compact('siswas', 'komponens', 'subkomponens'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        for ($i = 0; $i < count($request->nilai); $i++) {
            Penilaian::updateOrCreate([
                'nisn' => $request->nisn,
                'komponen_id' => $request->komponen_id[$i],
                'subkomponen_id' => $request->subkomponen_id[$i]
            ], [
                'nilai' => $request->nilai[$i]
            ]);
        }

        return redirect('penilaian/input/' . $request->nisn)->with('status', 'Sub penilaian berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Penilaian  $penilaian
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    public function input_nilai($id)
    {
        $siswa = Siswa::where('nisn', $id)->first();
        $komponens = Komponen::all();
        $subkomponens = Subkomponen::with(['komponen'])->paginate(5);

        foreach ($subkomponens as $sk) {
            $p = Penilaian::where('nisn', '=', $id)->where('subkomponen_id', '=', $sk->id)->first();
            if ($p != null) {
                $sk->penilaian = $p->nilai;
                $sk->penilaian_id = $p->id;
            } else {
                $sk->penilaian = 0;
                $sk->penilaian_id = '';
            }
        }

        return view('penilaian/input', compact('siswa', 'subkomponens', 'komponens'));
    }

    public function detail_nilai($id)
    {
        $siswa = Siswa::where('nisn', $id)->first();
        $komponens = Komponen::selectRaw('komponens.id, komponens.nama_komponen, AVG(penilaians.nilai) as nilai')
                    ->join('subkomponens', 'subkomponens.komponen_id', '=', 'komponens.id')
                    ->join('penilaians', 'penilaians.subkomponen_id', '=', 'subkomponens.id')
                    ->where('penilaians.nisn', '=', $id)
                    ->where('penilaians.nilai', '>', 0)
                    ->groupBy(['id', 'nama_komponen'])
                    ->get();

        $sumNilai = 0;

        foreach ($komponens as $item) {
            $subkomponens = Subkomponen::selectRaw('subkomponens.subkomponen')
                            ->join('penilaians', 'penilaians.subkomponen_id', '=', 'subkomponens.id')
                            ->where('penilaians.nisn', '=', $id)
                            ->where('penilaians.nilai', '>', 0)
                            ->where('subkomponens.komponen_id', '=', $item->id)
                            ->pluck('subkomponen');

            $item->subkomponens = $subkomponens;
            $sumNilai += $item->nilai;
        }

        $total = round($sumNilai / $komponens->count());

        return view('penilaian/detail', compact('siswa', 'komponens', 'total'));
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
