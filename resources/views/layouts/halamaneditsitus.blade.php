@extends('layouts.master')

@section('situs')
@parent
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit category</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('lukisan.index') }}"> Back</a>
            </div>
        </div>
    </div>
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
         
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

			@if (session('gagal'))
			    <div class="alert alert-danger">
			        {{ session('gagal') }}
			    </div>
			@endif
          <form action="{{ route('situs.update',$situs->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
             <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <img src="{{ url('situses/'.$situs->id.'.jpg?'.now()) }}" style="max-height: 200px">
                </div>
                <div class="form-group">
                    <strong>Gambar:</strong>
                    <input type="file" class="form-control" name="gambar" placeholder="Masukkan gambar" >
                </div>
              </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Deskripsi:</strong>
                      <textarea class="textarea" placeholder="Deskripsi" name="deskripsi" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required>{{ $situs->deskripsi }}</textarea>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                  <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
        </form>
          </div>
        </section>
        <!-- /.Left col -->
        
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  @endsection