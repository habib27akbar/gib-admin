@extends('layouts.master')
@section('title','Pendaftaran')
@section('content')
        
        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Pendaftaran</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Master</a></li>
                                    <li><a href="#">Pendaftaran</a></li>
                                    <li class="active">Data Pendaftaran</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content -->
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Pendaftaran</strong>
                            </div>
                            <div class="card-body">
                                @include('include.admin.alert')
                                {{-- <a href="{{ route('pendaftaran.create') }}" class="btn btn-primary mb-3">Tambah</a> --}}
                                
                                <table id="data-load" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>Telp</th>
                                            <th>Email</th>
                                            <th>Perusahaan</th>
                                           
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                   
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
        <!-- /.content -->
@section('js')
<script>
   $('#data-load').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('pendaftaran.data') }}",
        order: [[4, 'asc'], [1, 'asc']], // Urutkan berdasarkan Perusahaan (index 4), lalu Nama (index 1)
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'nama', name: 'nama' },
            { data: 'telp', name: 'telp' },
            { data: 'email', name: 'email' },
            { data: 'perusahaan', name: 'perusahaan' },
            
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });
</script>
@endsection
@endsection