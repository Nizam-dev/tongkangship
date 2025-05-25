<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\kapal;
use App\Models\kategori;

class KapalController extends Controller
{

    public function index()
    {
        $data['data'] = kapal::leftjoin('kategoris', 'kategoris.id', '=', 'kapals.kategori_id')
        ->select('kapals.*', 'kategoris.kategori')
        ->get();
        return view('admin.kapal.index', $data);
    }

  
    public function create()
    {
        $data['kategori'] = kategori::all();
        return view('admin.kapal.create', $data);
    }

   
    public function store(Request $request)
    {
        $data = $request->all();
        if($request->has('foto_kapal')) {
            $nama_foto = time() . '.' . $request->file('foto_kapal')->getClientOriginalExtension();
            $request->file('foto_kapal')->move('images/kapal', $nama_foto);
            $data['foto_kapal'] = $nama_foto;
        }
        kapal::create($data);
        return redirect('admin/kapal')->with('success', 'Data berhasil disimpan');
    }

    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['data'] = kapal::find($id);
        $data['kategori'] = kategori::all();
        return view('admin.kapal.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $data = $request->all();
        if($request->has('foto_kapal')) {
            $nama_foto = time() . '.' . $request->file('foto_kapal')->getClientOriginalExtension();
            $request->file('foto_kapal')->move('images/kapal', $nama_foto);
            $data['foto_kapal'] = $nama_foto;
        }
        kapal::find($id)->update($data);
        return redirect('admin/kapal')->with('success', 'Data berhasil disimpan');
    }

   
    public function destroy(string $id)
    {
        kapal::find($id)->delete();
        return redirect('admin/kapal')->with('success', 'Data berhasil dihapus');
    }
}
