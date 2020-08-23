@extends('layouts.app')

@section('content')
    @include('panel.layouts.navigation')
    @include('panel.layouts.sidebar')
        <div class="main-content">
            <div class="section">
                <div class="section-header">
                    <h1>Kategori</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                        <div class="breadcrumb-item">Kategori</div>
                    </div>
                </div>
                <div class="section-body">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                          <div class="card-header">
                            <a href="{{ route('category.create') }}" class="btn btn-icon icon-left btn-primary btn-sm" > <i class="fas fa-plus"></i> Tambah Kategori</a>
                          </div>
                          <div class="card-body p-0">
                            <div class="table-responsive">
                              {{-- {{$dataTable->table()}} --}}
                              <table class="table table-striped table-md" id="users-table">
                                <thead>
                                  <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->slug }}</td>
                                        <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                        <td>
                                          <a href="#" class="btn btn-icon btn-primary"><i class="far fa-edit"></i></a>
                                          <a href="#" class="btn btn-icon btn-danger"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
@endsection