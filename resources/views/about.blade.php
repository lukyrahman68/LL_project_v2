@extends('layouts.masterdepan')

@section('header')
    <!-- Header -->
    <header class="masthead bg-primary text-white text-center img_header">
        <div class="container" style="position:relative;">
        <div style="position:absolute;bottom:-80px;right:0;">
            <h3>About Angelynn and Helen</h3>
        </div>
        </div>
    </header>
@endsection
@section('content')
<section style="background: #F2EEE2">
    <div class="container container_about">
        <div class="left_item padding_art SourceSansPro_Regular">

                {!!html_entity_decode($situs[0]->deskripsi)!!}

        </div>
        <div class="right_item">
            <img src="{{ URL::asset('situses/'.$situs[0]->id.'.jpg?') }}" alt="">
        </div>
    </div><br><br><br>
    <div class="container container_about">
        <div class="left_item">
            <img src="{{ URL::asset('situses/'.$situs[1]->id.'.jpg?') }}" alt="">
        </div>
        <div class="right_item padding_art SourceSansPro_Regular">

                {!!html_entity_decode($situs[1]->deskripsi)!!}

        </div>
    </div>
</section>
@endsection
