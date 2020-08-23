@extends('layouts.app')

@section('content')
    @include('panel.layouts.navigation')
    @include('panel.layouts.sidebar')
        <div class="main-content">
            <div class="section">
                <div class="section-header">
                    <h1>Tag</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                        <div class="breadcrumb-item">Tag</div>
                    </div>
                </div>
                <div class="section-body">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                          <div class="card-header">
                            <a href="{{ route('tag.create') }}" class="btn btn-icon icon-left btn-primary btn-sm" > <i class="fas fa-plus"></i> Tambah Tag</a>
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
                                    <th>Created_at</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($tags as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->slug }}</td>
                                        <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                        <td>
                                          <a href="tag/{{ $item->slug }}/edit" class="btn btn-icon btn-primary"><i class="far fa-edit"></i></a>
                                          <a href="#" data-id="{{ $item->id }}" class="btn btn-icon btn-danger swal-confirm">
                                          <form action="{{ route('tag.delete',$item->id) }}" method="post" id="delete{{ $item->id }}"> 
                                            @csrf
                                            @method('delete')
                                          </form>  
                                            <i class="fas fa-trash" data-id="{{ $item->id }}"></i>
                                          </a>
                                          
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

@push('scripts')
<script>
      $('.swal-confirm').click(function(e){
        // mendapatkan id ketika di klik
        id = e.target.dataset.id;

        swal({
          title: "Apakah Anda yakin?",
          text: "Data yang terhapus tidak bisa dibalikin!!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            // swal("Poof! Your imaginary file has been deleted!", {
            //   icon: "success",
            // });
            // url ke routing
            $(`#delete${id}`).submit()
          } else {
            // swal("Your imaginary file is safe!");
          }
        });
      })
</script>
@endpush