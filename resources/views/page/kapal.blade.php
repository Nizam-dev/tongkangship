@extends('layouts.master')
@section('content')

<!-- Service Start -->
<div class="container-xxl py-5">

    <div class="container py-5">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="text-secondary text-uppercase">Kapal Tongkang</h6>
            <h1 class="mb-5">Sewa Atau Beli Kapal</h1>
        </div>
        <div class="row g-4">


            @foreach($kapal as $k)
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item p-4">
                    <div class="overflow-hidden mb-4">
                        <img class="img-fluid" src="{{asset('images/kapal/'.$k->foto_kapal)}}" style="height: 200px;" alt="">
                    </div>
                    <h4 class="mb-3">{{$k->nama_kapal}}</h4>
                    <!-- to short desckripsi -->
                    <p>{{ substr($k->deskripsi, 0, 60) }}</p>
                    <a class="btn-slide mt-2" href="{{url('kapal/detail', $k->id)}}"><i class="fa fa-arrow-right"></i><span>Detail</span></a>
                </div>
            </div>
            @endforeach

        
        </div>
    </div>
</div>
<!-- Service End -->


@endsection