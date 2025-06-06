<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\booking;
use Carbon\Carbon;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['data'] = booking::leftjoin('kapals', 'kapals.id', '=', 'bookings.kapal_id')
        ->leftjoin('kategoris', 'kategoris.id', '=', 'kapals.kategori_id')
        ->leftjoin('users', 'users.id', '=', 'bookings.user_id')
        ->leftjoin('route_pelabuhans', 'route_pelabuhans.id', '=', 'bookings.pelabuhan_id')
        ->leftjoin('list_pelabuhans as from', 'from.id', '=', 'route_pelabuhans.from_id')
        ->leftjoin('list_pelabuhans as to', 'to.id', '=', 'route_pelabuhans.to_id')
        ->select('bookings.*', 'kapals.nama_kapal', 'kategoris.kategori','from.nama_pelabuhan as pelabuhan_asal', 'to.nama_pelabuhan as pelabuhan_tujuan', 'to.lokasi as lokasi_pelabuhan','route_pelabuhans.etimasi','route_pelabuhans.operational')
        ->get();
        return view('admin.booking.index', $data);
    }

    public function editstatus($id, Request $request)
    {
        $data = $request->all();
        booking::find($id)->update($data);
        return redirect()->back()->with('success', 'Status berhasil diubah');
    }

    public function kirimkapal($id)
    {
        booking::find($id)->update(['status' => 'kapal sedang dikirim', 'tanggal_pengiriman' => Carbon::now()]);
        return redirect()->back()->with('success', 'Status berhasil diubah');
    }

  
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
