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
                                <form action="{{ route('article.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @include('panel.artikel.partials.form-control', ['submit' => 'submit'])
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
