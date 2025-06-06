<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\booking;
use App\Models\kapal;
use App\Models\pelabuhan;
use App\Models\ListPelabuhan;
use App\Models\RoutePelabuhan;
use Carbon\Carbon;
class BookingController extends Controller
{
    public function sewa($id)
    {
        $data['pelabuhan'] = ListPelabuhan::all();
        $data['kapal'] = kapal::leftjoin('kategoris', 'kategoris.id', '=', 'kapals.kategori_id')
        ->select('kapals.*', 'kategoris.kategori')
        ->find($id);
        if(!$data['kapal']) {
            abort(404);
        }
        if($data['kapal']->harga_sewa == null) {
            abort(404);
        }
        return view('user.sewa', $data);
    }
    public function beli($id)
    {
        $data['pelabuhan'] = pelabuhan::all();
        $data['kapal'] = kapal::leftjoin('kategoris', 'kategoris.id', '=', 'kapals.kategori_id')
        ->select('kapals.*', 'kategoris.kategori')
        ->find($id);
        if(!$data['kapal']) {
            abort(404);
        }
        if($data['kapal']->harga_jual == null) {
            abort(404);
        }
        return view('user.beli', $data);
    }

    public function booking(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        $cek = RoutePelabuhan::where('from_id', $request->pelabuhan_asal)->where('to_id', $request->pelabuhan_tujuan)->first();
        if(!$cek) {
            return redirect()->back()->with('error', 'Route tidak tersedia');
        }
        $kapal = kapal::find($request->kapal_id);
        if($request->type_booking == 'sewa') {
            $tanggal_mulai = Carbon::parse($request->tanggal_mulai);
            $tanggal_selesai = Carbon::parse($request->tanggal_selesai);
            $data['total'] = $kapal->harga_sewa * $tanggal_selesai->diffInDays($tanggal_mulai);
        } else {
            $data['total'] = $kapal->harga_jual;
        }
        $data['total'] = $data['total'] + $cek->operational;
        $data['status'] = 'pembayaran';
        $data['kode_booking'] = "INVT".rand(100000, 999999);
        $data['pelabuhan_id'] = $cek->id;
        unset($data['pelabuhan_asal'], $data['pelabuhan_tujuan']);
        booking::create($data);
        return redirect('transaksi')->with('success', 'Data berhasil disimpan');
    }

    public function transaksi()
    {
        $data['data'] = booking::leftjoin('kapals', 'kapals.id', '=', 'bookings.kapal_id')
        ->leftjoin('kategoris', 'kategoris.id', '=', 'kapals.kategori_id')
        ->leftjoin('route_pelabuhans', 'route_pelabuhans.id', '=', 'bookings.pelabuhan_id')
        ->leftjoin('list_pelabuhans as from', 'from.id', '=', 'route_pelabuhans.from_id')
        ->leftjoin('list_pelabuhans as to', 'to.id', '=', 'route_pelabuhans.to_id')
        ->select('bookings.*', 'kapals.nama_kapal', 'kategoris.kategori','from.nama_pelabuhan as pelabuhan_asal', 'to.nama_pelabuhan as pelabuhan_tujuan', 'to.lokasi as lokasi_pelabuhan','route_pelabuhans.etimasi','route_pelabuhans.operational')
        ->where('bookings.user_id', auth()->user()->id)
        ->orderby('id', 'desc')
        ->get();
        foreach($data['data'] as $item) {
            if($item->status == 'pembayaran' && $item->created_at->format('Y-m-d') < Carbon::now()->format('Y-m-d')) {
                $item->update(['status' => 'expired']);
            }
        }
        return view('user.transaksi', $data);
    }

    public function pembayaran($id)
    {
        $data['data'] = booking::leftjoin('kapals', 'kapals.id', '=', 'bookings.kapal_id')
        ->leftjoin('kategoris', 'kategoris.id', '=', 'kapals.kategori_id')
        ->leftjoin('route_pelabuhans', 'route_pelabuhans.id', '=', 'bookings.pelabuhan_id')
        ->leftjoin('list_pelabuhans as from', 'from.id', '=', 'route_pelabuhans.from_id')
        ->leftjoin('list_pelabuhans as to', 'to.id', '=', 'route_pelabuhans.to_id')
        ->select('bookings.*', 'kapals.nama_kapal', 'kategoris.kategori','from.nama_pelabuhan as pelabuhan_asal', 'to.nama_pelabuhan as pelabuhan_tujuan', 'to.lokasi as lokasi_pelabuhan','route_pelabuhans.etimasi','route_pelabuhans.operational')
        ->find($id);
        return view('user.pembayaran', $data);
    }

    public function bayar(Request $request, $id)
    {
        $data = $request->all();
        if($request->has('bukti_pembayaran')) {
            $nama_foto = time() . '.' . $request->file('bukti_pembayaran')->getClientOriginalExtension();
            $request->file('bukti_pembayaran')->move('images/bukti_pembayaran', $nama_foto);
            $data['bukti_pembayaran'] = $nama_foto;
        }
        $data['status'] = 'menunggu konfirmasi';
        booking::find($id)->update($data);
        return redirect('transaksi')->with('success', 'Pembayaran berhasil dikirim');
    }

    public function tracking($id){
        $data['kapal'] = booking::leftjoin('kapals', 'kapals.id', '=', 'bookings.kapal_id')
        ->leftjoin('kategoris', 'kategoris.id', '=', 'kapals.kategori_id')
        ->leftjoin('route_pelabuhans', 'route_pelabuhans.id', '=', 'bookings.pelabuhan_id')
        ->leftjoin('list_pelabuhans as from', 'from.id', '=', 'route_pelabuhans.from_id')
        ->leftjoin('list_pelabuhans as to', 'to.id', '=', 'route_pelabuhans.to_id')
        ->select('bookings.*', 'kapals.nama_kapal', 'kategoris.kategori','from.nama_pelabuhan as pelabuhan_asal', 'to.nama_pelabuhan as pelabuhan_tujuan', 'to.lokasi as lokasi_pelabuhan','route_pelabuhans.etimasi','route_pelabuhans.operational')
        ->find($id);
        return view('user.tracking', $data);
    }

    public function cekbop(Request $request)
    {
        $cek_rute = RoutePelabuhan::where('from_id', $request->pelabuhan_asal)->where('to_id', $request->pelabuhan_tujuan)->first();
        if($cek_rute) {
            return response()->json(['status' => true, "harga"=> $cek_rute->operational]);
        } else {
            return response()->json(['status' => false]);
        }
    }
}
