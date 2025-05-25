@extends('layouts2.master')
@section('title_page', 'Kategori')
@section('content')

<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-end mb-4">
            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modal-add">
                <i class="ti ti-plus"></i>
                <span>Tambah Kategori</span>
            </button>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-stripped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->kategori }}</td>
                        <td>
                            <d class="d-flex gap-2">
                                <button class="btn btn-sm btn-warning" onclick='edit({{ $item }})'><i
                                        class="ti ti-pencil"></i></button>
                                <form action="{{ url('admin/kategori/'.$item->id) }}" method="POST">
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


<!-- Modal Add -->

<div class="modal fade" id="modal-add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('admin/kategori') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Nama Kategori:</label>
                        <input type="text" class="form-control" id="recipient-name" name="kategori">
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


<!-- Modal Edit -->

<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" id="form-edit">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Nama Kategori:</label>
                        <input type="text" class="form-control" id="recipient-name" name="kategori">
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
@push('js')
<script>
    function edit(data) {
        $('#form-edit').attr('action', "{{ url('admin/kategori') }}/" + data.id);
        $('#modal-edit [name=kategori]').val(data.kategori);
        $('#modal-edit').modal('show');
    }
</script>
@endpush