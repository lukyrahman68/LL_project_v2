@extends('layouts.master')

@section('klukisan')
@parent
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Lukisan
        {{session('success')}}
        <small>Edit Lukisan</small>
      </h1>

      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Lukisan</a></li>
        <li class="active">Edit</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Lukisan</h3>
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
                  <th>Judul</th>
                  <th>Deskripsi(s)</th>
                  <th>Waktu dibuat</th>
                  <th>Terakhir diperbarui</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($lukisan as $lukisan)
                  <tr>
                  <td align="center"><img src="{{ url('uploads/'.$lukisan->img) }}" style="max-height: 200px"></td>
                  <td><?php $a = html_entity_decode($lukisan->nama);
                  if(strlen($a)<90){
                    echo $a;
                  }else{
                    echo substr($a, 0,90)." ...";
                  }?></td>
                  <td><?php $b = html_entity_decode($lukisan->deskripsi);
                  if(strlen($b)<90){
                    echo $b;
                  }else{
                    echo substr($b, 0,90)." ...";
                  }?></td>
                  <td>{{$lukisan->created_at}}</td>
                  <td>{{$lukisan->updated_at}}</td>
                  <td>

                    <form action="{{ route('lukisan.destroy',$lukisan->id) }}" method="POST">
                      @csrf
                    <a class="btn btn-info" href="{{ route('lukisan.show',$lukisan->id) }}">Show</a>
                    <a class="btn btn-success" href="{{ route('lukisan.edit',$lukisan->id) }}">Edit</a>

                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>

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
