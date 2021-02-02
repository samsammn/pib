@extends('layouts.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Penilaian</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Penilaian</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
    <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Penilaian</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="" >
              @method('patch')
              @csrf
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">ID Penilaian</label>
                    <input type="text" class="form-control" name="id" value="" disabled placeholder="Nama Komponen Baru">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">NISN</label>
                    <input type="text" class="form-control" name="id" value="" disabled placeholder="Nama Komponen Baru" value="{{ $siswas->nisn }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Komponen</label>
                    <input type="text" class="form-control" name="nama_komponen" value="" placeholder="Nama Komponen Baru">
                  </div>
                 
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

      
        <!-- /.row -->
      </div>
    </section>
    <!-- /.content -->
  </div>
@endsection