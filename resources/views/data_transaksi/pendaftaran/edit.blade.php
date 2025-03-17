@extends('layouts.master')
@section('title','Pendaftaran Customer')
@section('content')
        
        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Pendaftaran Customer</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Master</a></li>
                                    <li><a href="#">Customer</a></li>
                                    <li class="active">Pendaftaran Customer</li>
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
                                <strong class="card-title">Otorisasi Customer</strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="{{ route('pendaftaran.update', ['pendaftaran' => $pendaftaran['id_pendaftaran']]) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    @csrf
                                    @method('PUT')
                                    <div class="row form-group">
                                        <div class="col col-md-2"><label for="text-input" class=" form-control-label">Nama</label></div>
                                        <div class="col-12 col-md-4">
                                            <input type="text" id="text-input" name="nama" placeholder="Nama" class="form-control" value="{{ $pendaftaran->nama }}" readonly>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-2"><label for="text-input" class=" form-control-label">NIK</label></div>
                                        <div class="col-12 col-md-4">
                                            <input type="text" id="text-input" name="ktp" placeholder="KTP" class="form-control" value="{{ $pendaftaran->ktp }}" readonly>
                                        </div>
                                    </div>


                                    <div class="row form-group">
                                        <div class="col col-md-2"><label for="text-input" class=" form-control-label">Telepon</label></div>
                                        <div class="col-12 col-md-4">
                                            <input type="text" id="text-input" name="no_telp" placeholder="Telepon" class="form-control" value="{{ $pendaftaran->telp }}" readonly>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-2"><label for="text-input" class=" form-control-label">Email</label></div>
                                        <div class="col-12 col-md-4">
                                            <input type="email" id="text-input" name="email" placeholder="Email" class="form-control" value="{{ $pendaftaran->email }}" readonly>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-2"><label for="text-input" class=" form-control-label">Perusahaan</label></div>
                                        <div class="col-12 col-md-5">
                                            <input type="text" id="text-input" name="perusahaan" placeholder="Alamat" class="form-control" value="{{ $pendaftaran->perusahaan }}" readonly>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-2"><label for="text-input" class=" form-control-label">Alamat</label></div>
                                        <div class="col-12 col-md-10">
                                            <input type="text" id="text-input" name="alamat" placeholder="Alamat" class="form-control" value="{{ $pendaftaran->alamat }}" readonly>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary">
                                        Otorisasi
                                    </button>
                                    <a href="{{ route('pendaftaran.index') }}" class="btn btn-default">
                                        Batal
                                    </button>
                                </form>
                            </div>
                           
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
        <!-- /.content -->

@endsection