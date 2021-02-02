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
              <form method="POST" action="{{ url('penilaians') }}" >
              @csrf
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">ID Penilaian</label>
                    <input type="text" class="form-control" name="id" placeholder="Nama Komponen Baru" value="{{ $siswas->nisn }}">
                  
                  </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">NAMA SISWA</label>
                    <select name="nisn" class="form-control">
                    
                          <option value=" ">--Pilih--</option>
                          @foreach ($siswas as $item)
                          <option value="{{ $item->nisn }}">{{ $item->nama_siswa }}</option>
                          @endforeach
                         
                         
                        </select>
                  
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">KOMPONEN</label>
                    <select name="komponen_id" class="form-control">
                    
                    <option value="-">--Pilih--</option>
                    @foreach ($komponens as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_komponen }}</option>
                    @endforeach
                   
                   
                  </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">SUB KOMPONEN</label>
                    <select name="subkomponen_id" class="form-control">
                    
                    <option value="-">--Pilih--</option>
                    @foreach ($subkomponens as $item)
                    <option value="{{ $item->id }}">{{ $item->subkomponen }}</option>
                    @endforeach
                   
                   
                  </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nilai</label>
                    <select name="nilai" class="form-control">
                    
                    <option value="0">--Pilih--</option>
                    <option value="4">A</option>
                    <option value="3">B</option>
                    <option value="2">C</option>
                    <option value="1">D</option>
                  </select>
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