@extends('layouts2.master')
@section('title_page', 'Dashboard')
@section('content')


<div class="row">

    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <h6 class="mb-2 f-w-400 text-muted">Total Kategori</h6>
                <h4 class="mb-3"><span class="badge bg-light-primary border border-primary"></i>{{$total_kategori}}</span></h4>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <h6 class="mb-2 f-w-400 text-muted">Total Kapal</h6>
                <h4 class="mb-3"><span class="badge bg-light-success border border-success"></i>{{$total_kapal}}</span></h4>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <h6 class="mb-2 f-w-400 text-muted">Total Order</h6>
                <h4 class="mb-3"><span class="badge bg-light-warning border border-warning"></i> {{$total_booking}}</span></h4>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <h6 class="mb-2 f-w-400 text-muted">Total User</h6>
                <h4 class="mb-3"><span class="badge bg-light-danger border border-danger"></i>{{$total_user}}</span></h4>
            </div>
        </div>
    </div>

   
</div>
@endsection