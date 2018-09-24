@extends('layouts.master')

@section('foto')
@parent
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Foto
        <small>Edit Foto</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Foto</a></li>
        <li class="active">Data Foto</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data foto</h3>
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
                @foreach ($foto as $foto)
                  <tr>
                  <td align="center"><img src="{{ url('fotos/'.$foto->img) }}" style="max-height: 200px"></td>
                  <td><?php $a = html_entity_decode($foto->nama);
                  if(strlen($a)<90){
                    echo $a;
                  }else{
                    echo substr($a, 0,90)." ...";
                  }?></td>
                  <td><?php $b = html_entity_decode($foto->deskripsi);
                  if(strlen($b)<90){
                    echo $b;
                  }else{
                    echo substr($b, 0,90)." ...";
                  }?></td>
                  <td>{{$foto->created_at}}</td>
                  <td>{{$foto->updated_at}}</td>
                  <td>
                    <form action="{{ route('foto.destroy',$foto->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('foto.show',$foto->id) }}">Show</a>
                    <a class="btn btn-success" href="{{ route('foto.edit',$foto->id) }}">Edit</a>
                    @csrf
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
