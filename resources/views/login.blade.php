@extends('layouts.master')
@section('content')

<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container py-5">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="text-secondary text-uppercase">Selamat Datang</h6>
            <h1 class="mb-5">Masuk</h1>
        </div>

        <div class="row mt-2">
            <div class="col-md-7 mx-auto wow fadeInUp" data-wow-delay="0.1s">
                <div class="card rounded">
                    <div class="card-body">
                        <form action="" method="post">
                            @csrf
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="email" class="form-control bg-transparent" id="email"
                                            placeholder="Your Email" name="email">
                                        <label for="email">Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="password" class="form-control bg-transparent" id="password"
                                            placeholder="Your Password" name="password">
                                        <label for="password">Password</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Masuk</button>
                                </div>
                                <div class="col-12 mt-4">
                                    <p class="mb-0 text-end">Belum punya akun? <a href="/register">Daftar</a></p>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- Service End -->


@endsection