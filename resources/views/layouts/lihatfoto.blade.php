@extends('layouts.master')

@section('foto')
@parent
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <div class="col-lg-12">
            <div class="pull-left">
                <h2>Edit category</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('foto.index') }}"> Back</a>
            </div>
        </div>
    </div>
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable margin-tb">

          <!-- quick email widget -->
          <div class="box box-info padding_box">
            <div class="box-header">
              <i class="fa fa-envelope"></i>

              <h3 class="box-title">Form foto</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <!--button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button-->
              </div>
              <!-- /. tools -->
            </div>
             <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                        <strong>Gambar:</strong><br>
                        <img src="{{ url('fotos/'.$foto->img) }}" style="max-height: 200px">
                    </div>
                    <div class="form-group">
                        <strong>Judul:</strong>
                        {{ $foto->nama }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Deskripsi:</strong>
                        {!! html_entity_decode($foto->deskripsi) !!}
                    </div>
                </div>
            </div>
       </div>
        </section>
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
@endsection
