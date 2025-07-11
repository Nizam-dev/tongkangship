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
                    <span class="badge bg-success stok">Pilih Tanggl untuk melihat Stok</span> 

                    <table class="table table-bordered">
                   
                        @if($kapal->harga_sewa != null)
                        <tr>
                            <th><h5 class="text-primary">Harga Sewa</h5></th>
                            <td>
                                <h5 class="text-primary">: Rp. {{number_format($kapal->harga_sewa)}} / Hari</h5>
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
                    <h3 class="text-primary">Sewa</h3>
                    <form action="{{ url('booking') }}" method="post">
                        @csrf
                        <input type="hidden" name="type_booking" value="sewa">
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
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tanggal">Mulai Tanggal</label>
                                    <input type="date" class="form-control"  placeholder="Tanggal" name="tanggal_mulai" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tanggal">Sampai Tanggal</label>
                                    <input type="date" class="form-control"  placeholder="Tanggal" name="tanggal_selesai" required>
                                </div>
                            </div>
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
                        <div class="form-group mb-2">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control"  placeholder="Alamat" name="alamat" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary py-3 px-5" id="pesan">Pesan</button>
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

    $('input[name="tanggal_mulai"], input[name="tanggal_selesai"]').on('change', async function(){
        if( $('input[name="tanggal_mulai"]').val() != '' && $('input[name="tanggal_selesai"]').val() != '' ){
            await cek_stok();
        }
    })
    let cek_stok = async ()=>{
        let kapal_id = $('input[name="kapal_id"]').val();
        let tanggal_mulai = $('input[name="tanggal_mulai"]').val();
        let tanggal_selesai = $('input[name="tanggal_selesai"]').val();
        await axios.post("{{url('cekstok')}}", {kapal_id:kapal_id, tanggal_mulai:tanggal_mulai, tanggal_selesai:tanggal_selesai}).then(res => {
            if(res.data.stok > 0) {
                $('.stok').html(`Stok : ${res.data.stok} kapal`);
                $.notify("Stok tersedia", "success");
                $("#pesan").prop('disabled', false);
            }else{
                $('.stok').html(`Stok : 0 kapal`);
                 $.notify("Stok tidak tersedia", "error");
                $("#pesan").prop('disabled', true);
            }
        })
    }
</script>
@endpush