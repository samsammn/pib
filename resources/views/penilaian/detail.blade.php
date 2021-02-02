@extends('layouts.master')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Paraktik Ibadah</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Penilaian</li>
                        </ol>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="col-md-2"></div>
                                <div class="col-md-12"></div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6"></div>
                                        <div class="col-sm-12 col-md-6"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="example2"
                                                class="table table-bordered table-hover dataTable dtr-inline" role="grid"
                                                aria-describedby="example2_info">
                                                <thead>
                                                    <tr>
                                                        <td colspan="5">
                                                            <form action="{{ url('penilaians') }}" method="POST">
                                                                @csrf

                                                                NISN
                                                                <input type="text" name="nisn" value="{{ $siswa->nisn }}" class="form-control">
                                                                NAMA Siswa
                                                                <input type="text" disabled value="{{ $siswa->nama_siswa }}" class="form-control">
                                                        </td>
                                                    </tr>
                                                    <tr role="row">
                                                        <th class="sorting_asc" tabindex="0" aria-controls="example2"
                                                            rowspan="1" colspan="1" aria-sort="ascending"
                                                            aria-label="Rendering engine: activate to sort column descending">
                                                            <center>NO.</center>
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example2"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            <center>KOMPONEN</center>
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example2"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            <center>SUB KOMPONEN</center>
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example2"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            <center>Nilai</center>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($komponens as $item)
                                                        <tr role="row" class="even">
                                                            <td class="dtr-control sorting_1" tabindex="0">
                                                                <center>{{ $loop->iteration }}</center>
                                                            </td>
                                                            <td>{{ $item->nama_komponen }}</td>
                                                            <td>
                                                                <ul>
                                                                @foreach ($item->subkomponens as $sk)
                                                                    <li>{{ $sk }}</li>
                                                                @endforeach
                                                                </ul>
                                                            </td>
                                                            <td>{{ $item->nilai }}</td>
                                                        </tr>
                                                    @endforeach
                                                    @php ($values = [0 => '0', 4 => 'A', 3 => 'B', 2 => 'C', 1 => 'D'])

                                                    <tr>
                                                        <td colspan="3">Total Nilai</td>
                                                        <td>{{ $values[$total] }}</td>
                                                    </tr>
                                                </tbody>
                                                </form>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-5">
                                            <div class="dataTables_info" id="example2_info" role="status"
                                                aria-live="polite">Showing 1 to 10 of 57 entries</div>
                                        </div>
                                        <div class="col-sm-12 col-md-7">
                                            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                                <ul class="pagination">
                                                    <li class="paginate_button page-item previous disabled"
                                                        id="example2_previous">
                                                        <a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0"
                                                            class="page-link">Previous</a>
                                                    </li>
                                                    <li class="paginate_button page-item active">
                                                        <a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0"
                                                            class="page-link">1</a>
                                                    </li>
                                                    <li class="paginate_button page-item ">
                                                        <a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0"
                                                            class="page-link">2</a>
                                                    </li>
                                                    <li class="paginate_button page-item ">
                                                        <a href="#" aria-controls="example2" data-dt-idx="3" tabindex="0"
                                                            class="page-link">3</a>
                                                    </li>
                                                    <li class="paginate_button page-item ">
                                                        <a href="#" aria-controls="example2" data-dt-idx="4" tabindex="0"
                                                            class="page-link">4</a>
                                                    </li>
                                                    <li class="paginate_button page-item ">
                                                        <a href="#" aria-controls="example2" data-dt-idx="5" tabindex="0"
                                                            class="page-link">5</a>
                                                    </li>
                                                    <li class="paginate_button page-item ">
                                                        <a href="#" aria-controls="example2" data-dt-idx="6" tabindex="0"
                                                            class="page-link">6</a>
                                                    </li>
                                                    <li class="paginate_button page-item next" id="example2_next">
                                                        <a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0"
                                                            class="page-link">Next</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
