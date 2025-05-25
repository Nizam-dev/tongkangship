@extends('layouts2.master')
@section('title_page', 'Tambah Kapal')
@section('content')

<div class="card">
    <div class="card-body">
        
        <form action="{{ url('admin/kapal') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 form-group">
                <label for="" class="form-label">Nama Kapal: <small class="text-danger">*</small></label>
                <input type="text" class="form-control" id="" name="nama_kapal" required>
            </div>
            <div class="mb-3 form-group">
                <label for="" class="form-label">Kategori:</label>
                <select name="kategori_id" class="form-control">
                    @foreach ($kategori as $item)
                    <option value="{{ $item->id }}">{{ $item->kategori }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3 form-group">
                <label for="" class="form-label">Foto:</label>
                <input type="file" class="form-control" id="" name="foto_kapal" accept="image/*">
            </div>
            <div class="mb-3 form-group">
                <label for="" class="form-label">Deskripsi: <small class="text-danger">*</small></label>
                <textarea name="deskripsi" id="" cols="30" rows="10" class="form-control" required></textarea>
            </div>
             <div class="mb-3 form-group">
                <label for="" class="form-label">Stok:</label>
                <input type="number" class="form-control" id="" name="stok" required>
            </div> 
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="" class="form-label">Harga Jual</label>
                    <input type="text" class="form-control" id="" name="harga_jual">
                </div>
                <div class="col-md-6">
                    <label for="" class="form-label">Harga Sewa</label>
                    <input type="text" class="form-control" id="" name="harga_sewa">
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>

       
    </div>
</div>




@endsection
