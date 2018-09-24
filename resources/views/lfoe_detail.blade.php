@extends('layouts.masterdepan')

@section('header')
    <!-- Header -->
    <header class="masthead bg-primary text-white text-center img_header">
        <div class="container" style="position:relative;">
        <div style="position:absolute;bottom:-80px;right:0;">
            <h3>Life from Our Eyes</h3>
        </div>
        </div>
    </header>
@endsection
@section('content')
    <section style="background: #F2EEE2">
        <div class="container lfoe_container">
            <div class="lfoe_img">
                <img src="{{ URL::asset('uploads/'.$lukisan->id.'.jpg') }}" alt="">
            </div>
            <div class="lfoe_content">{{$lukisan->id}}<br>
                {!!html_entity_decode($lukisan->deskripsi)!!}
            </div>
        </div>
    </section>
@endsection
