<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\booking;
use App\Models\kapal;
use App\Models\kategori;

class DashboardController extends Controller
{
    public function index()
    {
        $data['total_user'] = User::where('role', 'user')->count();
        $data['total_booking'] = booking::count();
        $data['total_kapal'] = kapal::count();
        $data['total_kategori'] = kategori::count();
        return view('admin.dashboard', $data);
    }
}
