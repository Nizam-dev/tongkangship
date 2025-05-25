@extends('layouts.master')
@push('css')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
  <style>
    #map { height: 400px; }
    .kapal-icon img {
        transition: transform 0.3s ease;
    }
  </style>
@endpush
@section('content')
   <!-- Carousel Start -->
    <div class="container-fluid p-0 pb-5">
        <div class="owl-carousel header-carousel position-relative mb-5">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="{{asset('theme')}}/img/carousel-1.jpg" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                    style="background: rgba(6, 3, 21, .5);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <h5 class="text-white text-uppercase mb-3 animated slideInDown">Transport & Logistics
                                    Solution</h5>
                                <h1 class="display-3 text-white animated slideInDown mb-4"> <span
                                        class="text-primary">Solusi</span> Penyewaan</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">Sewa kapal tongkang harian, mingguan, atau bulanan. Armada terawat, crew profesional, cocok untuk proyek logistik laut. Harga fleksibel, bisa negosiasi sesuai kebutuhan.</p>
                                <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Beli</a>
                                <a href="" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Sewa</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="{{asset('theme')}}/img/ship2.jpeg" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                    style="background: rgba(6, 3, 21, .5);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <h5 class="text-white text-uppercase mb-3 animated slideInDown">Transport & Logistics
                                    Solution</h5>
                                <h1 class="display-3 text-white animated slideInDown mb-4"> <span
                                        class="text-primary">Solusi</span> Pembelian</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">kapal tongkang siap pakai, kondisi prima, cocok untuk angkutan batu bara, pasir, atau kargo laut. Kapasitas besar, dokumen lengkap, siap kirim ke seluruh Indonesia.</p>
                                 <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Beli</a>
                                <a href="" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Sewa</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- About Start -->
    <div class="container overflow-hidden py-5 px-lg-0">
        <div class="container about py-5 px-lg-0">
            <h1 class="mb-4">Tracking Kapal Tongkang</h1>
      <div id="map"></div>
        </div>
    </div>
    <!-- About End -->


    <!-- Fact Start -->
    <div class="container-xxl py-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="text-secondary text-uppercase mb-3">Some Facts</h6>
                    <h1 class="mb-5">Tempat #1 Untuk Mengelola Semua Pengiriman Anda</h1>
                    <p class="mb-5">
                        Selamat datang di platform layanan pemesanan dan pelacakan kapal tongkang yang inovatif dan terpercaya. Kami adalah penyedia solusi logistik laut yang menghubungkan pelabuhan, industri, dan kebutuhan pengiriman barang berat antar pulau dengan efisien dan aman.
                    </p>
                    <div class="d-flex align-items-center">
                        <i class="fa fa-headphones fa-2x flex-shrink-0 bg-primary p-3 text-white"></i>
                        <div class="ps-4">
                            <h6>Call for any query!</h6>
                            <h3 class="text-primary m-0">+012 345 6789</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row g-4 align-items-center">
                        <div class="col-sm-6">
                            <div class="bg-primary p-4 mb-4 wow fadeIn" data-wow-delay="0.3s">
                                <i class="fa fa-users fa-2x text-white mb-3"></i>
                                <h2 class="text-white mb-2" data-toggle="counter-up">1234</h2>
                                <p class="text-white mb-0">Happy Clients</p>
                            </div>
                            <div class="bg-secondary p-4 wow fadeIn" data-wow-delay="0.5s">
                                <i class="fa fa-ship fa-2x text-white mb-3"></i>
                                <h2 class="text-white mb-2" data-toggle="counter-up">1234</h2>
                                <p class="text-white mb-0">Complete Shipments</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="bg-success p-4 wow fadeIn" data-wow-delay="0.7s">
                                <i class="fa fa-star fa-2x text-white mb-3"></i>
                                <h2 class="text-white mb-2" data-toggle="counter-up">1234</h2>
                                <p class="text-white mb-0">Customer Reviews</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fact End -->




    <!-- Feature Start -->
    <div class="container-fluid overflow-hidden py-5 px-lg-0">
        <div class="container feature py-5 px-lg-0">
            <div class="row g-5 mx-lg-0">
                <div class="col-lg-6 feature-text wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="text-secondary text-uppercase mb-3">Our Features</h6>
                    <h1 class="mb-5">We Are Trusted Logistics Company Since 1990</h1>
                    <div class="d-flex mb-5 wow fadeInUp" data-wow-delay="0.3s">
                        <i class="fa fa-globe text-primary fa-3x flex-shrink-0"></i>
                        <div class="ms-4">
                            <h5>Worldwide Service</h5>
                            <p class="mb-0">Memesan kapal tongkang secara cepat dan mudah</p>
                        </div>
                    </div>
                    <div class="d-flex mb-5 wow fadeIn" data-wow-delay="0.5s">
                        <i class="fa fa-shipping-fast text-primary fa-3x flex-shrink-0"></i>
                        <div class="ms-4">
                            <h5>On Time Delivery</h5>
                            <p class="mb-0">Melacak posisi kapal secara real-time melalui peta interaktif</p>
                        </div>
                    </div>
                    <div class="d-flex mb-0 wow fadeInUp" data-wow-delay="0.7s">
                        <i class="fa fa-headphones text-primary fa-3x flex-shrink-0"></i>
                        <div class="ms-4">
                            <h5>24/7 Telephone Support</h5>
                            <p class="mb-0">Dapatkan dukungan telepon 24/7 untuk pertanyaan dan layanan pelanggan</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 pe-lg-0 wow fadeInRight" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100" src="{{asset('theme')}}/img/ship3.jpeg"
                            style="object-fit: cover;" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->




  



    <!-- Testimonial Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="text-center">
                <h6 class="text-secondary text-uppercase">Testimonial</h6>
                <h1 class="mb-0">Our Clients Say!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                <div class="testimonial-item p-4 my-5">
                    <i class="fa fa-quote-right fa-3x text-light position-absolute top-0 end-0 mt-n3 me-4"></i>
                    <div class="d-flex align-items-end mb-4">
                        <img class="img-fluid flex-shrink-0" src="{{asset('theme')}}/img/testimonial-1.jpg"
                            style="width: 80px; height: 80px;">
                        <div class="ms-4">
                            <h5 class="mb-1">Ryan Rizky</h5>
                            <p class="m-0">Profession</p>
                        </div>
                    </div>
                    <p class="mb-0">Wah pengiriman cepat dan mudah.</p>
                </div>
                <div class="testimonial-item p-4 my-5">
                    <i class="fa fa-quote-right fa-3x text-light position-absolute top-0 end-0 mt-n3 me-4"></i>
                    <div class="d-flex align-items-end mb-4">
                        <img class="img-fluid flex-shrink-0" src="{{asset('theme')}}/img/testimonial-2.jpg"
                            style="width: 80px; height: 80px;">
                        <div class="ms-4">
                            <h5 class="mb-1">Biantoro</h5>
                            <p class="m-0">Profession</p>
                        </div>
                    </div>
                    <p class="mb-0">Pelayanan baik</p>
                </div>
                <div class="testimonial-item p-4 my-5">
                    <i class="fa fa-quote-right fa-3x text-light position-absolute top-0 end-0 mt-n3 me-4"></i>
                    <div class="d-flex align-items-end mb-4">
                        <img class="img-fluid flex-shrink-0" src="{{asset('theme')}}/img/testimonial-3.jpg"
                            style="width: 80px; height: 80px;">
                        <div class="ms-4">
                            <h5 class="mb-1">Septioanto</h5>
                            <p class="m-0">Profession</p>
                        </div>
                    </div>
                    <p class="mb-0">Good service and fast delivery</p>
                </div>
                <div class="testimonial-item p-4 my-5">
                    <i class="fa fa-quote-right fa-3x text-light position-absolute top-0 end-0 mt-n3 me-4"></i>
                    <div class="d-flex align-items-end mb-4">
                        <img class="img-fluid flex-shrink-0" src="{{asset('theme')}}/img/testimonial-4.jpg"
                            style="width: 80px; height: 80px;">
                        <div class="ms-4">
                            <h5 class="mb-1">Hamid S</h5>
                            <p class="m-0">Profession</p>
                        </div>
                    </div>
                    <p class="mb-0">Fast and reliable service</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->

@endsection

@push('js')
 <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>

    $(document).ready(() => {
        get_data_kapal();
    })

    const get_data_kapal = async () => {
        await axios.get("{{url('trackingkapal')}}").then((res) => {
            res.data.forEach((item) => {
                console.log(JSON.parse(item.route));
                lokasi_kapal(item);
            })
            
        })
    }

    // const kapalIcon = L.icon({
    //     iconUrl: "{{asset('images/ship.png')}}", // contoh icon kapal
    //     iconSize: [32, 32], // ukuran gambar
    //     iconAnchor: [16, 16], // titik tengah icon
    //     popupAnchor: [0, -16] // posisi popup terhadap icon
    // });
    const kapalIcon = L.divIcon({
        className: 'kapal-icon',
        html: `<img src="{{asset('images/ship.png')}}" style="width:32px; transform: rotate(0deg);" />`,
        iconSize: [32, 32],
        iconAnchor: [16, 16],
    });


   const map = L.map('map').setView([-1.5, 117.5], 5.3);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);
    
  const randomColor = () => {
    const letters = '0123456789ABCDEF';
    let color = '#';
    for (let i = 0; i < 6; i++) {
      color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
  };

 
  let lokasi_kapal = async (data) => {
    const route = JSON.parse(data.route);
    const coords = route.features[0].geometry.coordinates.map(([lng, lat]) => [lat, lng]);
    // L.polyline(coords, { color: 'aqua' }).addTo(map);

    // --- Hitung waktu
    const startDate = new Date(data.tanggal_pengiriman);
    const now = new Date();
    const estHari = parseFloat(data.etimasi);
    const totalMinutes = estHari * 24 * 60;

    const elapsedMinutes = Math.floor((now - startDate) / 60000); // dalam menit
    const progress = Math.min(elapsedMinutes / totalMinutes, 1);  // 0 - 1

    // --- Tentukan posisi berdasarkan progress waktu
    const totalSteps = coords.length - 1;
    const index = Math.floor(progress * totalSteps);


    const totalDistance = totalRouteDistance(coords);
    const progressDistance = totalDistance * progress;
    const currentPos = getInterpolatedPosition(coords, progressDistance);
    const marker = L.marker(currentPos, { icon: kapalIcon }).addTo(map).bindPopup(`${data.nama_kapal} Posisi Saat Ini`);
    
    // const prev = coords[index - 1];
    // const next = coords[index];

    // if (prev && next) {
    //     const angle = getAngle(prev[0], prev[1], next[0], next[1]);
    //     const img = marker.getElement().querySelector('img');
    //     if (img) img.style.transform = `rotate(${angle}deg)`;
    // }
    // const marker = L.marker(coords[index], { icon: kapalIcon }).addTo(map).bindPopup(`${data.nama_kapal} Posisi Saat Ini`);

    // Optional: Tambahkan garis highlight dari awal ke posisi sekarang
    const slicedCoords = coords.slice(0, index + 1);
    // L.polyline(slicedCoords, { color: 'orange', weight: 5, opacity: 0.5 }).addTo(map);

    if (progress >= 1) {
        marker.bindPopup(`${data.nama_kapal} Telah Tiba`);
    }
};




function haversineDistance(lat1, lon1, lat2, lon2) {
  const R = 6371e3; // meter
  const toRad = angle => angle * Math.PI / 180;

  const φ1 = toRad(lat1);
  const φ2 = toRad(lat2);
  const Δφ = toRad(lat2 - lat1);
  const Δλ = toRad(lon2 - lon1);

  const a = Math.sin(Δφ / 2) * Math.sin(Δφ / 2) +
            Math.cos(φ1) * Math.cos(φ2) *
            Math.sin(Δλ / 2) * Math.sin(Δλ / 2);
  const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));

  return R * c;
}


function totalRouteDistance(coords) {
  let total = 0;
  for (let i = 1; i < coords.length; i++) {
    total += haversineDistance(
      coords[i-1][0], coords[i-1][1],
      coords[i][0], coords[i][1]
    );
  }
  return total; // dalam meter
}

function getInterpolatedPosition(coords, targetDistance) {
  let traveled = 0;
  for (let i = 1; i < coords.length; i++) {
    const [lat1, lng1] = coords[i - 1];
    const [lat2, lng2] = coords[i];
    const segment = haversineDistance(lat1, lng1, lat2, lng2);

    if (traveled + segment >= targetDistance) {
      const remaining = targetDistance - traveled;
      const ratio = remaining / segment;

      // Linear interpolation
      const lat = lat1 + (lat2 - lat1) * ratio;
      const lng = lng1 + (lng2 - lng1) * ratio;

      return [lat, lng];
    }

    traveled += segment;
  }

  // Kalau target melebihi total, kembalikan titik akhir
  return coords[coords.length - 1];
}

function getAngle(lat1, lng1, lat2, lng2) {
  const dx = lng2 - lng1;
  const dy = lat2 - lat1;
  const angle = Math.atan2(dy, dx) * 180 / Math.PI;
  return angle;
}

  


</script>


@endpush