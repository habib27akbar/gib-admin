@extends('layouts.master')
@section('title','Produk')
@section('content')
        
        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Produk</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Master</a></li>
                                    <li><a href="#">Produk</a></li>
                                    <li class="active">Ubah Produk</li>
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
                                <strong class="card-title">Ubah Produk</strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="{{ route('produk.update', ['produk' => $produk['id']]) }}"  method="post" enctype="multipart/form-data" class="form-horizontal">
                                    @csrf
                                    @method('PUT')
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Produk</label></div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="nama_produk" placeholder="Nama Produk" value="{{ $produk['nama_produk'] }}" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Deskripsi Produk</label></div>
                                        <div class="col-12 col-md-9">
                                            <textarea id="deskripsi" name="deskripsi" required>{{ $produk['deskripsi'] }}</textarea>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Gambar Produk</label></div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="text-input" name="gambar" class="form-control">
                                            <input type="hidden" name="image_old" value="{{ $produk['gambar'] }}">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label class=" form-control-label">Aktif</label></div>
                                        <div class="col col-md-9">
                                            <div class="form-check-inline form-check">
                                                <label for="inline-radio1" class="form-check-label " style="margin-right: 10px">
                                                    <input type="radio" id="inline-radio1" name="active"  value="1" {{ $produk['active'] == 1?'checked':'' }} class="form-check-input">Aktif
                                                </label>
                                                <label for="inline-radio2" class="form-check-label ">
                                                    <input type="radio" id="inline-radio2" name="active" value="0" {{ $produk['active'] == 0?'checked':'' }} class="form-check-input">Tidak Aktif
                                                </label>
                                               
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        Simpan
                                    </button>
                                    <a href="{{ route('produk.index') }}" class="btn btn-default">
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
@section('js')
<!-- Summernote CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.css" rel="stylesheet">
<!-- Summernote JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.js"></script>

<script>
    $(document).ready(function() {
        $('#deskripsi').summernote({
            height: 300, // Atur tinggi editor
            placeholder: 'Tulis deskripsi produk di sini...',
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    });
</script>
@endsection
@endsection