<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Arsip;
use App\Models\kategori;

class ArsipController extends Controller
{
    public function index()
    {
        $data = Arsip::with('kategori')->orderBy('tanggal_terima','desc')->get();
        return view('tampil_surat', compact('data'));
    }

    public function create()
    {
        $kategori = kategori::all();
        
        return view('tambah_surat', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_surat' => 'required',
            'pengirim' => 'required',
            'perihal' => 'required',
            'tanggal_terima' => 'required',
            'sifat' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'id_kategori' => 'required'
        ]);

        // upload foto
        $path = null;
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('uploads', 'public');
        }

        Arsip::create([
            'foto' => $path,
            'nomor_surat' => $request->nomor_surat,
            'pengirim' => $request->pengirim,
            'perihal' => $request->perihal,
            'tanggal_terima' => $request->tanggal_terima,
            'sifat' => $request->sifat,
            'id_kategori' => $request->id_kategori
        ]);

        return redirect('/surat')->with('success','Data surat berhasil ditambahkan');
    }

    public function edit($id)
    {
        $surat = DB::table('arsips')->where('id',$id)->first();
        return view('edit', compact('surat'));
    }

    public function update(Request $request, $id)
    {
        $data = Arsip::findOrFail($id);

        $data->nomor_surat = $request->nomor_surat;
        $data->pengirim = $request->pengirim;
        $data->perihal = $request->perihal;
        $data->tanggal_terima = $request->tanggal_terima;
        $data->sifat = $request->sifat;

        // update foto
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('uploads', 'public');
            $data->foto = $path;
        }

        $data->save();

        return redirect('/surat')->with('success','Data surat berhasil diupdate');
    }

    public function destroy($id)
    {
        DB::table('arsips')->where('id',$id)->delete();
        return redirect('/surat')->with('success','Data surat berhasil dihapus');
    }
}