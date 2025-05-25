@extends('layouts.master')
@push('css')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<style>
    #map {
        height: 300px;
    }

    .kapal-icon img {
        transition: transform 0.3s ease;
    }
    .wheater img{
        width : 31px;
        margin-right : 10px;
    }
    .wheater p{
        padding-top : 5px;
        font-size :11px;
    }
    .table td{
        font-size : 11px;
    }
    .table p, .table b{
        margin : 0;
    }
</style>
@endpush
<?php
    function rand_suhu(){
        return rand(10,50);
    }
    function to_fahrenheit($celsius) {
        return ($celsius * 9 / 5) + 32;
    }
    function rand_kecepatan_kapal(){
        return rand(0,6);
    }
    $suhu =  rand_suhu();
?>
@section('content')

<div class="container overflow-hidden py-5 px-lg-0">
    <div class="container about py-5 px-lg-0">
        <div class="row">
            <div class="col-md-5">
                <div class="bg-info text-white text-center mb-2">SHIP POSITION & WEATHER</div>
                <div id="map"></div>
                <div class="wheater d-flex align-items-center justify-content-between px-5">
                    <div class="whater-icon d-flex align-items-center">
                        <img src="https://cdn-icons-png.flaticon.com/128/2100/2100100.png" alt="">
                        <p>{{ $suhu }} C<br>
                            {{ to_fahrenheit($suhu) }} F
                        </p>
                    </div>
                     <div class="whater-icon d-flex align-items-center">
                        <img src="https://cdn-icons-png.flaticon.com/128/1673/1673416.png" alt="">
                        <p>{{rand_kecepatan_kapal()}} kn <br>
                            1.7 m/s
                        </p>
                    </div>
                     <div class="whater-icon d-flex align-items-center">
                        <img src="https://cdn-icons-png.flaticon.com/128/2352/2352851.png" alt="">
                        <p>NA
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="bg-info text-white text-center mb-2">RECENT PORT CALLS</div>
                <table class="table table-hover table-stripped">
                    @php($sekarang = \Carbon\Carbon::now())
                    @php($tg = \Carbon\Carbon::parse($kapal->tanggal_pengiriman))
                    @for($i = 0; $i < 5; $i++)
                    <?php
                    $sekarang = $sekarang->subHours(3);
                    ?>
                    @if($sekarang->greaterThan($tg))
                   
                    <tr>
                        <td>
                            <p>From UTC</p>
                            <b>{{ $sekarang->format('d M Y H:i') }}</b>
                        </td>
                        <td>
                             <p>To UTC</p>
                            <b>{{ $sekarang->addHours(2)->format('d M Y H:i') }}</b>
                        </td>
                    </tr>
                    @endif
                    @endfor
                   
                </table>
            </div>
        </div>
    </div>

    <div class="container">

        <table class="table table-hover table-stripped table-bordered">
           
            <tr>
                <td>Nama Kapal</td>
                <td>: {{ $kapal->nama_kapal }}</td>
            </tr>
            <tr>
                <td>Kategori</td>
                <td>: {{ $kapal->kategori }}</td>
            </tr>
          
            <tr>
                <td>Tanggal</td>
                <td>: {{ date('d M Y', strtotime($kapal->tanggal_mulai)) }} Sampai
                    {{ date('d M Y', strtotime($kapal->tanggal_selesai)) }}</td>
            </tr>

            <tr>
                <td>Nama</td>
                <td>: {{ $kapal->nama }}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>: {{ $kapal->email }}</td>
            </tr>
            <tr>
                <td>No Hp</td>
                <td>: {{ $kapal->no_hp }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>: {{ $kapal->alamat }}</td>
            </tr>
            <tr>
                <td>Pelabuhan Pengiriman</td>
                <td>: {{ $kapal->nama_pelabuhan . ' - ' . $kapal->lokasi_pelabuhan }}</td>
            </tr>

        </table>

    </div>

</div>

<div class="container">
      @if($kapal->kategori == 'TUG BOAT')
        @include('page.d_tug_boat')
        @else
        @include('page.d_barge')
        @endif
</div>
@endsection

@push('js')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
    $(document).ready(() => {
        get_data_kapal();
    })

    const get_data_kapal = async () => {
        await axios.get("{{route('trackingkapal.detail', ['id' => $kapal->id])}}").then((res) => {
            res.data.forEach((item) => {
                console.log(JSON.parse(item.route));
                lokasi_kapal(item);
            })

        })
    }


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
        // L.polyline(coords, {
        //     color: 'aqua'
        // }).addTo(map);

        // --- Hitung waktu
        const startDate = new Date(data.tanggal_pengiriman);
        const now = new Date();
        const estHari = parseFloat(data.etimasi);
        const totalMinutes = estHari * 24 * 60;

        const elapsedMinutes = Math.floor((now - startDate) / 60000); // dalam menit
        const progress = Math.min(elapsedMinutes / totalMinutes, 1); // 0 - 1

        // --- Tentukan posisi berdasarkan progress waktu
        const totalSteps = coords.length - 1;
        const index = Math.floor(progress * totalSteps);


        const totalDistance = totalRouteDistance(coords);
        const progressDistance = totalDistance * progress;
        const currentPos = getInterpolatedPosition(coords, progressDistance);
        const marker = L.marker(currentPos, {
            icon: kapalIcon
        }).addTo(map).bindPopup(`1 Minute ago`).openPopup();
        map.panTo(currentPos);


        const slicedCoords = coords.slice(0, index + 1);
        // L.polyline(slicedCoords, { color: 'orange', weight: 5, opacity: 0.5 }).addTo(map);

        if (progress >= 1) {
            // marker.bindPopup(`${data.nama_kapal} Telah Tiba`);
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
                coords[i - 1][0], coords[i - 1][1],
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