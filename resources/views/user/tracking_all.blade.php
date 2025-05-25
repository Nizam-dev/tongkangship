@extends('layouts.master')
@push('css')
<style>
    table td{
        font-size : 12px;
    }
</style>
@endpush
@section('content')

   <div class="container-fluid overflow-hidden py-5 px-lg-0">
        <div class="container about py-5 px-lg-0">
           <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="bg-info text-white text-center mb-2"><b>TRACKING ALL KAPAL</b></div>
                <table class="table table-hover">
                    @foreach($data as $item)
                        <tr>
                            <td><img src="{{asset('images/kapal/'.$item->foto_kapal)}}" style="width:100px" class="img-fluid"></td>
                            <td><b>{{ $item->nama_kapal }} {{ $item->id }} </b></td>
                            <td>{{ $item->name }}</td>
                            <td><a href="{{url('tracking/'.$item->id)}}" class="text-info">Details</a></td>
                        </tr>
                    @endforeach
                </table>
            </div>
           </div>
        </div>
    </div>

@endsection