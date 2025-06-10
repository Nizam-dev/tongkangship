@extends('layouts.master')
@section('content')

   <div class="container-fluid overflow-hidden py-5 px-lg-0">
        <div class="container about py-5 px-lg-0">
            <div class="row g-5 mx-lg-0">
                <div class="col-lg-6 ps-lg-0 wow fadeInLeft" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100" src="{{asset('images/kapal')}}/{{$kapal->foto_kapal}}"
                            style="object-fit: cover;" alt="">
                    </div>
                </div>
                <div class="col-lg-6 about-text wow fadeInUp" data-wow-delay="0.3s">
                    <h1 class="mb-0">{{$kapal->nama_kapal}}</h1>
                    <h6 class="text-secondary text-uppercase mb-3">{{$kapal->kategori}}</h6>
                    <p class="mb-2">
                        {!! str_replace("\n", "<br>", $kapal->deskripsi) !!}
                    </p>

                    <p class="mb-3">
                        <!-- <span class="badge bg-success">Stok : {{$kapal->stok - $booking }}</span> -->
                    </p>

                    <!-- price -->
                    <table class="table table-bordered">
                        @if($kapal->harga_jual != null)
                        <tr>
                            <th><h5 class="text-primary">Harga Jual</h5></th>
                            <td>
                                <h5 class="text-primary">: Rp. {{number_format($kapal->harga_jual)}}</h5>
                            </td>
                        </tr>
                        @endif
                        @if($kapal->harga_sewa != null)
                        <tr>
                            <th><h5 class="text-primary">Harga Sewa</h5></th>
                            <td>
                                <h5 class="text-primary">: Rp. {{number_format($kapal->harga_sewa)}} / Hari</h5>
                            </td>
                        </tr>
                        @endif
                    </table>
                    @if($kapal->stok > 0)
                    <div class="d-flex align-items-center mt-3 justify-content-end">
                        @if($kapal->harga_sewa != null)
                        <a href="{{url('sewa/'.$kapal->id)}}" class="btn btn-primary py-3 px-5">Sewa</a>
                        @endif
                        @if($kapal->harga_jual != null)
                        <a href="{{url('beli/'.$kapal->id)}}" class="btn btn-secondary py-3 px-5">Beli</a>
                        @endif
                    </div>
                    @endif
                </div>
            </div>
        </div>
        @if($kapal->kategori == 'TUG BOAT')
        @include('page.d_tug_boat')
        @else
        @include('page.d_barge')
        @endif

    </div>

@endsection