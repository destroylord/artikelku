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
                            <a href="{{ route('category.create') }}" class="btn btn-icon icon-left btn-primary btn-sm" > <i class="fas fa-plus"></i> Tambah Artikel</a>
                          </div>
                          <div class="card-body p-0">
                            <div class="table-responsive">
                              {{-- {{$dataTable->table()}} --}}
                              <table class="table table-striped table-md" id="users-table">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Created At</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
@endsection
@push('scripts')
    $(function(){
      $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('categori.getCategory') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'slug', name: 'slug' },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' }
        ]
    });
    });
@endpush