@extends('layouts.masterdepan')

@section('header')
    <!-- Header -->
    <header class="masthead bg-primary text-white text-center img_header">
        <div class="container" style="position:relative;">
        <div style="position:absolute;bottom:-80px;right:0;padding:1em;">
            <h3>What We See</h3>
        </div>
        </div>
    </header>
@endsection
@section('content')
    <section style="background: #F2EEE2">
        <div class="container wws_container">
            <div class="wws_title SoljikDambaek">
                <center>
                    <h1>Our Photograph to Inspire Other</h1>
                </center>
            </div>
            <div class="wws_desc">
                <small>
                    <p>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Impedit laudantium vero, repellat minus ea asperiores, ullam ex deserunt ipsa eius totam eaque architecto doloribus nostrum, necessitatibus dolor provident commodi iure?
                    </p>
                </small>
            </div>
            <div class="wws_img">
                <div class="img_conatainer">
                    <?php
                    $a = 1
                    ?>
                    @foreach($foto as $fotos)
                    <?php
                    $b="";
                    if($a != 1){
                        $b=$a;
                        }
                    ?>
                    <div class="img_display<?php echo $b ?>">
                        <img src="{{ url('fotos/'.$fotos->img) }}" alt="">
                        <div class="img_title">{{$fotos->nama}} <br>
                            <?php $c = html_entity_decode($fotos->deskripsi);
                          if(strlen($c)<90){
                            echo $c;
                          }else{
                            echo substr($c, 0,90)." ...";
                          }?>
                        </div>
                        <a href="{{ url('wws_detail/'.$fotos->id) }}"><div class="img_more">More ></div></a>
                    </div>
                    <div class="page_init">
                            {{ $foto->links() }}
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

        </div>
        <br>

    </section>
@endsection
