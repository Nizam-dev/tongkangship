<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kapal;
use App\Models\ListPelabuhan;
use App\Models\RoutePelabuhan;
use App\Models\booking;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
    
        return view('page.home');
    }
    public function kapal()
    {
        $data['kapal'] = kapal::leftjoin('kategoris', 'kategoris.id', '=', 'kapals.kategori_id')
        ->select('kapals.*', 'kategoris.kategori')
        ->get();
        return view('page.kapal', $data);
    }

    public function kapal_detail($id)
    {
        $data['kapal'] = kapal::leftjoin('kategoris', 'kategoris.id', '=', 'kapals.kategori_id')
        ->select('kapals.*', 'kategoris.kategori')
        ->find($id);
        $data['booking'] = booking::where('kapal_id', $id)
        ->where('status', 'kapal sedang dikirim')
        ->count();
        return view('page.kapal_detail', $data);
    }
    public function about()
    {
        return view('page.about');
    }

    public function trackingkapal(){
        $data = booking::leftjoin('kapals', 'kapals.id', '=', 'bookings.kapal_id')
        ->leftjoin('kategoris', 'kategoris.id', '=', 'kapals.kategori_id')
        ->leftjoin('route_pelabuhans', 'route_pelabuhans.id', '=', 'bookings.pelabuhan_id')
        ->select('bookings.*', 'kapals.nama_kapal', 'kategoris.kategori', 'route_pelabuhans.route','route_pelabuhans.etimasi')
        ->where('bookings.status', 'kapal sedang dikirim')
        ->get();
        return response()->json($data);
    }

     public function tracking_all(){
        $data = booking::leftjoin('kapals', 'kapals.id', '=', 'bookings.kapal_id')
        ->leftjoin('kategoris', 'kategoris.id', '=', 'kapals.kategori_id')
        ->leftjoin('pelabuhans', 'pelabuhans.id', '=', 'bookings.pelabuhan_id')
        ->leftjoin('users', 'users.id', '=', 'bookings.user_id')
        ->select('bookings.*','users.name' ,'kapals.nama_kapal','kapals.foto_kapal', 'kategoris.kategori', 'pelabuhans.nama_pelabuhan', 'pelabuhans.route','pelabuhans.etimasi')
        ->where('bookings.status', 'kapal sedang dikirim')
        ->get();
        return view('user.tracking_all', compact('data'));
    }

    public function trackingkapal_detail(Request $request){
        $data = booking::leftjoin('kapals', 'kapals.id', '=', 'bookings.kapal_id')
        ->leftjoin('kategoris', 'kategoris.id', '=', 'kapals.kategori_id')
        ->leftjoin('route_pelabuhans', 'route_pelabuhans.id', '=', 'bookings.pelabuhan_id')
        ->select('bookings.*', 'kapals.nama_kapal', 'kategoris.kategori', 'route_pelabuhans.route','route_pelabuhans.etimasi')
        ->where('bookings.status', 'kapal sedang dikirim')
        ->where('bookings.id', $request->id)
        ->get();
        return response()->json($data);
    }

    public function profile()
    {
        return view('user.profile');
    }

    public function profile_update(Request $request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email
        ];
        if($request->has('password')) {
            $data['password'] = bcrypt($request->password);
        }
        auth()->user()->update($data);
        return redirect('profile')->with('success', 'Profile berhasil diupdate');
    }

    public function cekstok(Request $request){
        $startDate = Carbon::parse($request->tanggal_mulai);
        $endDate = Carbon::parse($request->tanggal_selesai);
        if($endDate->lessThan($startDate) || $startDate->lessThan(Carbon::now())){
            $data['stok'] = 0;
        }else{
            // ->where('status', 'kapal sedang dikirim')
            $cek_pesanan = booking::where('kapal_id', $request->kapal_id)
            ->where(function($query) use ($startDate, $endDate) {
            $query->whereBetween('tanggal_mulai', [$startDate, $endDate])
                ->orWhereBetween('tanggal_selesai', [$startDate, $endDate])
                ->orWhere(function($query) use ($startDate, $endDate) {
                    $query->where('tanggal_mulai', '<', $endDate)
                            ->where('tanggal_selesai', '>', $startDate);
                });
            })->count();
            $kapal = kapal::find($request->kapal_id);
            $data['stok'] = $kapal->stok - $cek_pesanan;
        }
        return response()->json($data);
    }
}
