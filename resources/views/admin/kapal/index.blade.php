@extends('layouts2.master')
@section('title_page', 'Kapal')
@section('content')

<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-end mb-4">
            <a href="{{url('admin/kapal/create')}}" class="btn btn-sm btn-primary">
                <i class="ti ti-plus"></i>
                <span>Tambah Kapal</span>
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-stripped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto Kapal</th>
                        <th>Nama Kapal</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><img src="{{ asset('images/kapal/'.$item->foto_kapal) }}" width="100px" class="img-thumbnail rounded"></td>
                        <td>{{ $item->nama_kapal }}</td>
                        <td>{{ $item->kategori }}</td>
                        <td>
                            @if($item->harga_jual != null)
                            <p>Jual : @formatRupiah($item->harga_jual)</p>
                            @endif
                            <hr>
                            @if($item->harga_sewa != null)
                            <p>Sewa : @formatRupiah($item->harga_sewa)</p>
                            @endif
                        </td>
                        <td>
                            <d class="d-flex gap-2">
                                <a class="btn btn-sm btn-warning" href="{{ url('admin/kapal/'.$item->id.'/edit') }}"><i
                                        class="ti ti-pencil"></i></a>
                                <form action="{{ url('admin/kapal/'.$item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"><i
                                            class="ti ti-trash"></i></button>
                                </form>
                            </d>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>




@endsection
