@extends('layouts.master')
@section('content')

<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container py-5">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="text-secondary text-uppercase">Selamat Datang</h6>
            <h1 class="mb-5">Daftar</h1>
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
                                        <input type="text" class="form-control bg-transparent" id="name"
                                            placeholder="Your Name" name="name">
                                        <label for="name">Name</label>
                                    </div>
                                </div>
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
                                    <button class="btn btn-primary w-100 py-3" type="submit">Daftar</button>
                                </div>
                                <div class="col-12 mt-4">
                                    <p class="mb-0 text-end">Sudah punya akun? <a href="/login">Masuk</a></p>
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