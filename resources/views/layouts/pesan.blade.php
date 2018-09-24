@extends('layouts.master')

@section('pesan')
@parent
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Pesan

      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Pesan</a></li>
        <li class="active">Data Pesan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Pesan</h3>
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
                  <th>Name</th>
                  <th>Email</th>
                  <th>Subject</th>
                  <th>Message</th>
                  <th>Waktu</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($pesan as $pesan)
                  <tr>
                  <td>{{$pesan->nama}}</td>
                  <td>{{$pesan->email}}</td>
                  <td>{{$pesan->judul}}</td>
                  <td><?php $b = html_entity_decode($pesan->pesan);
                  if(strlen($b)<90){
                    echo $b;
                  }else{
                    echo substr($b, 0,90)." ...";
                  }?></td>
                  <td>{{$pesan->updated_at}}</td>
                  <td>
                    <form action="{{ route('pesan.destroy',$pesan->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('pesan.show',$pesan->id) }}">Show</a>
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
