@extends('layouts.master')

@section('pesan')
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
                <a class="btn btn-success" href="{{ route('pesan.index') }}"> Back</a>
            </div>
        </div>
    </div>
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable margin-tb">
         
          <!-- quick email widget -->
          <div class="box box-info">
            <div class="box-header">
              <i class="fa fa-envelope"></i>

              <h3 class="box-title">Form Lukisan</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <!--button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button-->
              </div>
              <!-- /. tools -->
            </div>
            @if (session('sukses'))
          <div class="alert alert-success">
              {{ session('sukses') }}
          </div>
      @endif
             <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                        <strong>Name:</strong>
                        {{ $pesan->nama }}
                    </div>
                    <div class="form-group">
                        <strong>Email:</strong>
                        {{ $pesan->email }}
                    </div>
                    <div class="form-group">
                        <strong>Subject:</strong>
                        {{ $pesan->judul }}
                    </div>
                    <div class="form-group">
                        <strong>Message:</strong><br>
                        {!! html_entity_decode($pesan->pesan) !!}
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

    
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                
            </div>
        </div>
    </div>
@endsection