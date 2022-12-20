<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use App\Models\JenisUang;
use Illuminate\Http\Request;

class PemasukanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pemasukan.index', [
            'pemasukan' => Pemasukan::orderBy('id', 'desc')->get(),
            'jenis' => JenisUang::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pemasukan.create', [
            'jenis_uang' => JenisUang::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'jenis_uang' => 'required',
            'jumlah_pemasukan' => 'required'
        ]);
        Pemasukan::create($validatedData);

        return redirect('/admin/pemasukan')->with('success', 'Pemasukan ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pemasukan  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pemasukan $pemasukan)
    {
        return view('admin.pemasukan.edit', [
            'pemasukan' => $pemasukan,
            'jenis_uang' => JenisUang::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pemasukan  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pemasukan $pemasukan)
    {
        $validatedData = $request->validate([
            'jenis_uang' => 'required',
            'jumlah' => 'required'
        ]);

        Pemasukan::where('id', $pemasukan->id)->update($validatedData);

        return redirect('/')->with('success', 'Pemasukan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemasukan  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemasukan $pemasukan)
    {
        Pemasukan::destroy($pemasukan->id);

        return redirect('/admin/pemasukan')->with('success', 'Baris berhasil dihapus');
    }
}
