@extends('layouts.master')

@section('situs')
@parent
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Situs
        {{session('success')}}
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Situs</a></li>
        <li class="active">Data Situs</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data situs</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               @if (session('sukses'))
          <div class="alert alert-success">
              {{ session('sukses') }}
          </div>
      @endif

              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Gambar</th>
                  <th>Deskripsi(s)</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($situs as $situs)
                  <tr>
                  <td align="center"><img src="{{ url('situses/'.$situs->id.'.jpg?'.now()) }}" style="max-height: 200px"></td>
                  <td><?php $a = html_entity_decode($situs->deskripsi);
                  if(strlen($a)<90){
                    echo $a;
                  }else{
                    echo substr($a, 0,90)." ...";
                  }?></td>
                  <td>

                    <form action="{{ route('situs.destroy',$situs->id) }}" method="POST">
                      @csrf
                    <a class="btn btn-success" href="{{ route('situs.edit',$situs->id) }}">Edit</a>
                </form>
                  </td>
                </tr>
                @endforeach
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

    @endsection
