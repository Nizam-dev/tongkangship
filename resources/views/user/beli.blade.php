@extends('layouts.master')
@section('content')

   <div class="container-fluid overflow-hidden py-5 px-lg-0">
        <div class="container about py-5 px-lg-0">
            <div class="row g-5 mx-lg-0">
            
                <div class="col-lg-6 about-text wow fadeInUp" data-wow-delay="0.3s">
                    <h1 class="mb-0">{{$kapal->nama_kapal}}</h1>
                    <h6 class="text-secondary text-uppercase mb-3">{{$kapal->kategori}}</h6>
                    <p class="mb-5">
                        {!! str_replace("\n", "<br>", $kapal->deskripsi) !!}
                    </p>
                    <!-- price -->
                    <span class="badge bg-success">Stok</span> 
                    <table class="table table-bordered">
                        @if($kapal->harga_jual != null)
                        <tr>
                            <th><h5 class="text-primary">Harga</h5></th>
                            <td>
                                <h5 class="text-primary">: Rp. {{number_format($kapal->harga_jual)}}</h5>
                            </td>
                        </tr>
                        <tr>
                              <th><h5 class="text-primary">Biaya Pengiriman</h5></th>
                            <td>
                                <h5 class="text-primary bop">-</h5>
                            </td>
                        </tr>
                        @endif
                        
                    </table>
                    
                </div>
                <div class="col-lg-6 ps-lg-0 wow fadeInRight" data-wow-delay="0.1s">
                    <h3 class="text-primary">Beli</h3>
                    <form action="{{ url('booking') }}" method="post">
                        @csrf
                        <input type="hidden" name="type_booking" value="beli">
                        <input type="hidden" name="kapal_id" value="{{$kapal->id}}">
                        <div class="form-group mb-2">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control"  placeholder="Nama" name="nama" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="email">Email</label>
                            <input type="email" class="form-control"  placeholder="Email" name="email" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="no_hp">No. Handphone</label>
                            <input type="text" class="form-control"  placeholder="No. Handphone" name="no_hp" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control"  placeholder="Alamat" name="alamat" required></textarea>
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Pelabuhan Asal</label>
                            <select name="pelabuhan_asal" class="form-control" onchange="cek_route()">
                                @foreach ($pelabuhan as $item)
                                    <option value="{{$item->id}}">{{$item->nama_pelabuhan . ' - ' . $item->lokasi}}</option>
                                @endforeach
                            </select>
                        </div>
                          <div class="form-group mb-2">
                            <label for="">Pelabuhan Tujuan</label>
                            <select name="pelabuhan_tujuan" class="form-control" onchange="cek_route()">
                                @foreach ($pelabuhan as $item)
                                    <option value="{{$item->id}}">{{$item->nama_pelabuhan . ' - ' . $item->lokasi}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary py-3 px-5">Pesan</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('js')
<script>
    let cek_route = ()=>{
        let pelabuhan_asal = $('select[name="pelabuhan_asal"]').val();
        let pelabuhan_tujuan = $('select[name="pelabuhan_tujuan"]').val();
        axios.post("{{url('cekbiayaop')}}", {pelabuhan_asal:pelabuhan_asal, pelabuhan_tujuan:pelabuhan_tujuan}).then(res => {
            if(res.data.status) {
                $('.bop').html(`: Rp. ${res.data.harga.toLocaleString()}`);
            }else{
                $('.bop').html(`-`);
                 $.notify("Rute tidak tersedia", "error");
            }
        })
    }
</script>
@endpush