@extends('layouts.app')

@section('content')
    @include('panel.layouts.navigation')
    @include('panel.layouts.sidebar')
    <div class="main-content">
        <div class="section">
            <div class="section-header">
                <h1>Edit Kategori</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="#">Kategori</a></div>
                    <div class="breadcrumb-item">Edit kategori</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">
                    Edit kategori
                </h2>
                <p class="section-lead"></p>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Kategori : {{ $category->name }}</h4>
                            </div>
                            <div class="card-body">
                                <form action="/category/{{ $category->slug }}/edit" method="POST">
                                    @csrf
                                    @method('patch')
                                    @include('panel.categori.partials.form-control')
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection