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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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

        return redirect('/')->with('success', 'Jenis ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JenisUang  $jenisUang
     * @return \Illuminate\Http\Response
     */
    public function show(JenisUang $jenisUang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenisUang  $jenisUang
     * @return \Illuminate\Http\Response
     */
    public function edit(JenisUang $jenisUang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JenisUang  $jenisUang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JenisUang $jenisUang)
    {
        $rules = [];

        if ($request->title != $jenisUang->title) {
            $rules['nama_jenis'] = 'required|max:255|unique:posts';
        }

        $validatedData = $request->validate($rules);
        JenisUang::where('id', $jenisUang->id)->update($validatedData);

        return redirect('/')->with('success', 'Jenis berhasil diubah');
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

        return redirect('/')->with('success', 'Jenis dihapus');
    }
}
