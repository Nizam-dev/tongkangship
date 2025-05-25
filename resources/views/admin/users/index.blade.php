@extends('layouts2.master')
@section('title_page', 'Users')
@section('content')

<div class="card">
    <div class="card-body">
        <table class="table table-hover table-stripped ">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Tanggal Daftar</th>
                </tr>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->created_at->format('d M Y') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </thead>
        </table>
    </div>
</div>

@endsection