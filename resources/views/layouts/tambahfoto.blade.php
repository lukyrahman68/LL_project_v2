@extends('layouts.master')

@section('foto')
@parent
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Foto
        <small>Tambah Foto</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Foto</a></li>
        <li class="active">Tambah</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->

      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">

          <!-- quick email widget -->
          <div class="box box-info">
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
          <form action="foto" method="post" enctype="multipart/form-data">
          	@csrf
          	<div class="box-body">
              	<div class="form-group">
                  <input type="file" class="form-control file-input" name="gambar" placeholder="Masukkan gambar" >
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="judul" placeholder="Judul" required>
                </div>
                <div>
                  <textarea class="textarea" placeholder="Deskripsi" name="deskripsi" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
                </div>
            </div>
           <div class="box-footer clearfix">
              <button type="submit" class="pull-right btn btn-default" name="simpan" id="sendEmail">Simpan
                <i class="fa fa-arrow-circle-right"></i></button>
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
