@extends('layouts.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Sub Komponen</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Sub Komponen</li>
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
                <h3 class="card-title">Tambah Komponen</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{ url('subkomponens') }}" >
              @csrf
                <div class="card-body">

                  <div class="form-group">
                    <label for="exampleInputEmail1">Komponen</label>
                        <input type="hidden" name="komponen_id" value="{{ $komponen->id }}">
                        <input type="text" class="form-control" value="{{ $komponen->nama_komponen }}" disabled>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Sub Komponen</label>
                    <input type="text" class="form-control @error('subkomponen') is in-valid @enderror" name="subkomponen" placeholder="Nama Komponen Baru" value="{{ old('subkomponen') }}">
                    @error('subkomponen')
                    <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
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
