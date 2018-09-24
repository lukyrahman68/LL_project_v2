@extends('layouts.masterdepan')

@section('header')
    <!-- Header -->
    <header class="masthead bg-primary text-white text-center img_header">
        <div class="container" style="position:relative;">
        <div style="position:absolute;bottom:-80px;right:0;padding:1em;">
            <h3>Contact Us</h3>
        </div>
        </div>
    </header>
@endsection
@section('content')
<section style="background: #F2EEE2">
    <div class="alert container">
            @if (session('sukses'))
            <div class="alert alert-success">
                {{ session('sukses') }}
            </div>
            @endif

            @if (session('gagal'))
                <div class="alert alert-danger">
                    {{ session('gagal') }}
                </div>
            @endif
    </div>

    <div class="container container_contact">

        <div class="contact_title">
            We're open for collaboration
        </div>
        <div class="contact_main">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Neque cum quo, porro voluptas error dolores, nam, nulla provident ut fugiat illum esse suscipit magnam voluptatem eos quis. Saepe, blanditiis rerum.
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Neque cum quo, porro voluptas error dolores, nam, nulla provident ut fugiat illum esse suscipit magnam voluptatem eos quis. Saepe, blanditiis rerum.
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Neque cum quo, porro voluptas error dolores, nam, nulla provident ut fugiat illum esse suscipit magnam voluptatem eos quis. Saepe, blanditiis rerum.
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Neque cum quo, porro voluptas error dolores, nam, nulla provident ut fugiat illum esse suscipit magnam voluptatem eos quis. Saepe, blanditiis rerum.
        </div>

        <div class="contact_form">
            <form action="contact" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" name="nama" placeholder="Name">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="subject" placeholder="Subject">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="pesan" placeholder="Message">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="kirim" value="Send">
                </div>
        </div>
    </div>
</section>
@endsection
