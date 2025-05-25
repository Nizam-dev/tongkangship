<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\kategori;

class KategoriController extends Controller
{
    public function index()
    {
        $data['data'] = kategori::all();
        return view('admin.kategori.index', $data);
    }

    
    public function store(Request $request)
    {
        kategori::create($request->all());
        return redirect()->back()->with('success', 'Kategori berhasil ditambahkan');
    }

   

    public function update(Request $request, string $id)
    {
        kategori::find($id)->update($request->all());
        return redirect()->back()->with('success', 'Kategori berhasil diupdate');
    }

 
    public function destroy(string $id)
    {
        kategori::find($id)->delete();
        return redirect()->back()->with('success', 'Kategori berhasil dihapus');
    }
}
