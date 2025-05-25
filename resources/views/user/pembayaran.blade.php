@extends('layouts.master')
@push('css')
<style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
    }
    .invoice-box span{
        font-size : 12px;
    }
</style>
@endpush
@section('content')

<div class="container-fluid overflow-hidden py-5 px-lg-0">
    <div class="container">

        <div class="invoice-box">
            <h2 class="text-center mb-4">INVOICE
                <span class="float-end badge {{ $data->status == 'pembayaran' ? 'bg-danger' : 'bg-success' }}">
                    @if($data->status == 'pembayaran')
                    Menunggu Pembayaran
                    @else
                    Lunas
                    @endif
                </span>
            </h2>

            <div class="row">
                <div class="col">
                    <h6>Dari:</h6>
                    <p>
                        PT. Tongkang Ship<br>
                        Jl. Pelabuhan No. 88<br>
                        Sumatera Barat, Indonesia<br>
                        Email: info@tonkangship.com<br>
                        Telp: (021) 77598741
                    </p>
                </div>
                <div class="col text-end">
                    <h6>Kepada:</h6>
                    <p>
                        {{ $data->nama }}<br>
                        {{ $data->alamat }}<br>
                        Email: {{ $data->email }}<br>
                        Telp: {{ $data->no_hp }}
                    </p>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col">
                    <strong>Tanggal Invoice:</strong> {{ $data->created_at->format('d-m-Y') }}<br>
                    <strong>Nomor Invoice:</strong> {{ $data->kode_booking }}
                </div>
            </div>

            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Deskripsi</th>
                        <th>Durasi</th>
                        <th>Harga per Hari</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ ucwords($data->type_booking) }} Kapal Tongkang - {{ $data->nama_kapal }}</td>
                        <td>{{ \Carbon\Carbon::parse($data->tanggal_mulai)->diffInDays($data->tanggal_selesai) }} Hari</td>
                        <td>Rp {{ number_format($data->harga_sewa) }}</td>
                        <td>Rp {{ number_format($data->total) }}</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3" class="text-end">Subtotal</th>
                        <td>Rp {{ number_format($data->total) }}</td>
                    </tr>
                   
                    <tr>
                        <th colspan="3" class="text-end">Total</th>
                        <td><strong>Rp {{ number_format($data->total) }}</strong></td>
                    </tr>
                </tfoot>
            </table>

            <p><strong>Metode Pembayaran:</strong> Transfer Bank</p>
            <p><strong>Bank:</strong> BCA<br>
                <strong>No. Rekening:</strong> 003499871<br>
                <strong>Atas Nama:</strong> PT. Tonkang Ship</p>
            <hr>
            <form action="{{ url('pembayaran/'.$data->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-2">
                    <label for="bukti">Upload Bukti Pembayaran</label>
                    <input type="file" name="bukti_pembayaran" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Bayar</button>
            </form>
        </div>


    </div>
</div>

@endsection