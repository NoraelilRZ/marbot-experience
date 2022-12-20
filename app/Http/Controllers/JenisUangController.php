<?php

namespace App\Http\Controllers;

use App\Models\JenisUang;
use Illuminate\Http\Request;

class JenisUangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.jenis_uang.index',[
            'jenis_uang' => JenisUang::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jenis_uang.create',[
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
            'nama_jenis' => 'required',
        ]);
        JenisUang::create($validatedData);

        return redirect('/admin/jenis-uang')->with('success', 'Jenis ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisUang  $jenisUang
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisUang $jenisUang)
    {
        JenisUang::destroy($jenisUang->id);

        return redirect('/admin/jenis-uang')->with('success', 'Jenis dihapus');
    }
}
