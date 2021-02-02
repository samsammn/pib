@extends('layouts.master')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Penilaian Paraktik Ibadah</h1>
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
                                                    @foreach ($subkomponens as $key => $item)
                                                        <tr role="row" class="even">
                                                            <td class="dtr-control sorting_1" tabindex="0">
                                                                <center>{{ $subkomponens->firstItem() + $key }}</center>
                                                                <input type="hidden" name="id[]"
                                                                    value="{{ $item->penilaian_id }}"
                                                                    class="form-control">
                                                            </td>
                                                            <td>
                                                                <input type="hidden" name="komponen_id[]"
                                                                    class="form-control"
                                                                    value="{{ $item->komponen->id }}">{{ $item->komponen->nama_komponen }}

                                                            </td>
                                                            <td>
                                                                <input type="hidden" name="subkomponen_id[]"
                                                                    class="form-control"
                                                                    value="{{ $item->id }}">{{ $item->subkomponen }}

                                                            </td>
                                                            <td>
                                                                @php ($values = [0 => '0', 4 => 'A', 3 => 'B', 2 => 'C', 1 => 'D'])

                                                                <select name="nilai[]" class="form-control">
                                                                    @foreach ($values as $key => $val)
                                                                        @if ($key == $item->penilaian)
                                                                            <option value="{{ $key }}" selected>{{ $val }}</option>
                                                                        @else
                                                                            <option value="{{ $key }}">{{ $val }}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                </tbody>
                                                <tr>
                                                    <td colspan=4>
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </td>
                                                </tr>
                                                </form>
                                            </table>
                                        </div>
                                    </div>
                                    <?php echo $subkomponens->render(); ?>
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
