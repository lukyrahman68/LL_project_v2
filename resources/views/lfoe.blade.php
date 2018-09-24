@extends('layouts.masterdepan')

@section('header')
    <!-- Header -->
    <header class="masthead bg-primary text-white text-center img_header">
        <div class="container" style="position:relative;">
        <div style="position:absolute;bottom:-80px;right:0; padding:1em;">
            <h3>Life from Our Eyes</h3>
        </div>
        </div>
    </header>
    <div class="lfoe_desc_contaier">
        <div class="lfoe_desc SoljikDambaek">
            <br>
            <br>
            <center>
                <h1>Our Artwork Deliver a Message</h1>
            </center>
            <br>
            <br>
            <center>
                <small>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Commodi vero atque tenetur adipisci magni quae?
                    Incidunt mollitia facilis quia ad aperiam nostrum animi eius libero nemo eveniet, iure inventore impedit?</p>
                </small>
            </center>
        </div>
    </div>
@endsection
@section('content')
    <section style="background: #F2EEE2">
        <div class="container img_conatainer">
            <?php
            $a = 1
            ?>
            @foreach($lukisan as $lukisans)
            <?php
            $b="";
            if($a != 1){
                $b=$a;
                }
            ?>
            <div class="img_display<?php echo $b ?>">
                <img src="{{ url('uploads/'.$lukisans->img) }}" alt="">
                <div class="img_title">{{$lukisans->nama}} <br>
                    <?php $c = html_entity_decode($lukisans->deskripsi);
                  if(strlen($c)<90){
                    echo $c;
                  }else{
                    echo substr($c, 0,90)." ...";
                  }?>
                </div>
                <a href="{{ url('lfoe_detail/'.$lukisans->id) }}"><div class="img_more">More ></div></a>
            </div>
            <div class="page_init">
                    {{ $lukisan->links() }}
            </div>
            <?php
            if($a==4){
                $a=0;
                echo "</div>";
            }
            $a++;
            ?>
            @endforeach
        </div>
    </section>
@endsection
