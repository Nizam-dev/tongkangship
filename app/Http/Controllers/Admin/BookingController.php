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
        ->leftjoin('pelabuhans', 'pelabuhans.id', '=', 'bookings.pelabuhan_id')
        ->select('bookings.*', 'kapals.nama_kapal', 'kategoris.kategori', 'users.name','pelabuhans.nama_pelabuhan', 'pelabuhans.lokasi as lokasi_pelabuhan')
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
