@extends('layouts2.master')
@section('title_page', 'Route Pelabuhan')
@section('content')

<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-start mb-4 gap-2">
            <!-- filter from to -->
             <div class="form-group">
                <label for="from">Dari Pelabuhan</label>
                <select name="from" id="from" class="form-control">
                    <option value="">Semua</option>
                    @foreach ($pelabuhan as $item)
                    <option value="{{ $item->nama_pelabuhan }}">{{ $item->nama_pelabuhan }} - {{ $item->lokasi }}</option>
                    @endforeach
                </select>
             </div>

             <div class="form-group">
                <label for="to">Ke Pelabuhan</label>
                <select name="to" id="to" class="form-control">
                    <option value="">Semua</option>
                    @foreach ($pelabuhan as $item)
                    <option value="{{ $item->nama_pelabuhan }}">{{ $item->nama_pelabuhan }} - {{ $item->lokasi }}</option>
                    @endforeach
                </select>
             </div>

        </div>

        <div class="table-responsive">
            <table class="table table-hover table-stripped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Dari Pelabuhan</th>
                        <th>Ke Pelabuhan</th>
                        <th>Etimasi (Hari)</th>
                        <th>Operasional</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($route as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->from_pelabuhan }} - {{ $item->from_lokasi }}</td>
                        <td>{{ $item->to_pelabuhan }} - {{ $item->to_lokasi }}</td>
                        <td>{{ $item->etimasi }}</td>
                        <td>{{ $item->operational }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <button class="btn btn-sm btn-warning" onclick='edit({{ $item }})'><i
                                        class="ti ti-pencil"></i></button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
               
            </table>
        </div>

    </div>
</div>


<!-- modal edit -->
 <div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('admin/routepelabuhan') }}" method="POST" id="form-edit">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Dari</label>
                        <input type="text" class="form-control" name="from_pelabuhan" disabled>
                    </div>

                    <div class="form-group">
                        <label for="">Ke</label>
                        <input type="text" class="form-control" name="to_pelabuhan" disabled>
                    </div>
                    <div class="form-group">
                        <label for="">Etimasi</label>
                        <input type="number" name="etimasi" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Biaya Operasional</label>
                        <input type="number" name="operational" id="" class="form-control">
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
   $(document).ready(function () {
       $("table").DataTable();
   })
   $("#from, #to").change(function () {
       var from = $("#from").val();
       var to = $("#to").val();
    //    filter fromdata table
       $("table").DataTable().columns(1).search(from).draw();
       $("table").DataTable().columns(2).search(to).draw();
   })

   let edit = (data) => {
       console.log(data);
       $("#form-edit").attr('action', '/admin/routepelabuhan/' + data.id);
       $("#form-edit input[name='from_pelabuhan']").val(data.from_pelabuhan);
       $("#form-edit input[name='to_pelabuhan']").val(data.to_pelabuhan);
       $("#form-edit input[name='etimasi']").val(data.etimasi);
       $("#form-edit input[name='operational']").val(data.operational);
       $("#form-edit form").attr('action', `{{ url('admin/route-pelabuhan') }}/${data.id}`);
       $("#modal-edit").modal('show');
   }
</script>
@endpush