@extends('layouts.master')
@section('content')

<div class="container-fluid overflow-hidden py-5 px-lg-0">
    <div class="container">
        <h3>Profile</h3>
        <form action="" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" class="form-control" id="name" name="name" value="{{auth()->user()->name}}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{auth()->user()->email}}" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="*************">
            </div>
            <button type="submit" class="btn btn-primary mt-5">Update</button>
        </form>

    </div>
</div>

@endsection