@extends('layouts.app')

@section('content')
    @include('panel.layouts.navigation')
    @include('panel.layouts.sidebar')
    <div class="main-content">
        <div class="section">
            <div class="section-header">
                <h1>Tambah Artikel</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="#">Data artikelku</a></div>
                    <div class="breadcrumb-item">Tambah artikel</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">
                    Tambah artikel
                </h2>
                <p class="section-lead">Menambah artikelku agar semakin banyak</p>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Input Form</h4>
                            </div>
                            <div class="card-body">
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label for="judul">Judul</label>
                                        <input id="judul" class="form-control" type="text" name="judul">
                                    </div>
                                    <div class="form-group">
                                        <label for="slug">SEO</label>
                                        <input id="slug" class="form-control" type="text" name="slug">
                                    </div>
                                    <div class="form-group">
                                        <label for="Deskripsi">Deskripsi</label>
                                       <textarea name="deskripsi" class="form-control" id="editor" cols="40" rows="50"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="Kategori">Kategori</label>
                                        <select name="kategori" id="kategori" class="form-control">
                                            <option selecterd disable>Pilih salah satu</option>
                                            @foreach ($categories as $category)
                                                <option value="">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="tags">Tags</label> 

                                        <!-- Options -->
                                        <select id="multiple" multiple>
                                            @foreach ($tags as $tag)
                                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script>
$(function(){
    CKEDITOR.replace( 'editor' );
    new SlimSelect({
    select: '#multiple'
  })
});
</script>
@endpush