@extends('layouts.app')

@section('content')
    @include('panel.layouts.navigation')
    @include('panel.layouts.sidebar')
    <div class="main-content">
        <div class="section">
            <div class="section-header">
                <h1>Tambah Tag</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="#">Tag</a></div>
                    <div class="breadcrumb-item">Tambah Tag</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">
                    Tambah Tag
                </h2>
                <p class="section-lead"></p>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Input Form</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('tag.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Nama Tag</label>
                                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name">
                                    </div>
                                    @error('name')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                    @enderror
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection