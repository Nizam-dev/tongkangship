@extends('layouts.master')
@section('content')


    <!-- About Start -->
    <div class="container-fluid overflow-hidden py-5 px-lg-0">
        <div class="container about py-5 px-lg-0">
            <div class="row g-5 mx-lg-0">
                <div class="col-lg-6 ps-lg-0 wow fadeInLeft" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100" src="{{asset('theme')}}/img/ship4.jpg"
                            style="object-fit: cover;" alt="">
                    </div>
                </div>
                <div class="col-lg-6 about-text wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="text-secondary text-uppercase mb-3">About Us</h6>
                    <h1 class="mb-5">Quick Transport Tongkang Solutions</h1>
                    <p class="mb-5">
                        Selamat datang di platform layanan pemesanan dan pelacakan kapal tongkang yang inovatif dan terpercaya. Kami adalah penyedia solusi logistik laut yang menghubungkan pelabuhan, industri, dan kebutuhan pengiriman barang berat antar pulau dengan efisien dan aman.


                    </p>
                    <div class="row g-4 mb-5">
                        <div class="col-sm-6 wow fadeIn" data-wow-delay="0.5s">
                            <i class="fa fa-globe fa-3x text-primary mb-3"></i>
                            <h5>Global Coverage</h5>
                            <p class="m-0">Memesan kapal tongkang secara cepat dan mudah
                            </p>
                        </div>
                        <div class="col-sm-6 wow fadeIn" data-wow-delay="0.7s">
                            <i class="fa fa-shipping-fast fa-3x text-primary mb-3"></i>
                            <h5>On Time Delivery</h5>
                            <p class="m-0">Melacak posisi kapal secara real-time melalui peta interaktif
                            </p>
                        </div>
                    </div>
                    <a href="{{url('kapal')}}" class="btn btn-primary py-3 px-5">Explore More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


   

@endsection