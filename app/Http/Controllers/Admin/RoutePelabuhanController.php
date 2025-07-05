<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pelabuhan;
use App\Models\RoutePelabuhan;

class RoutePelabuhanController extends Controller
{
    public function index(){
        $pelabuhan = pelabuhan::all();
        $route = RoutePelabuhan::leftjoin('pelabuhans as pfrom', 'route_pelabuhans.from_id', '=', 'pfrom.id')
        ->leftjoin('pelabuhans as pto', 'route_pelabuhans.to_id', '=', 'pto.id')
        ->select('route_pelabuhans.*', 'pfrom.nama_pelabuhan as from_pelabuhan', 'pto.nama_pelabuhan as to_pelabuhan','pto.lokasi as to_lokasi','pfrom.lokasi as from_lokasi')
        ->get();
        return view('admin.route_pelabuhan.index', compact('route', 'pelabuhan'));
    }
    

    public function update(Request $request, $id){
        $route = RoutePelabuhan::find($id);
        $route->etimasi = $request->etimasi;
        $route->operational = $request->operational;
        $route->save();
        return redirect('admin/routepelabuhan')->with('success', 'Data berhasil diupdate');
    }
}
