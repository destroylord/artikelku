@extends('layouts.app')

@section('content')
    @include('panel.layouts.navigation')
    @include('panel.layouts.sidebar')
        <div class="main-content">
            <div class="section">
                <div class="section-header">
                    <h1>Data Artikelku</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                        <div class="breadcrumb-item">Data Artikelku</div>
                    </div>
                </div>
                <div class="section-body">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                          <div class="card-header">
                            <a href="{{ route('article.create') }}" class="btn btn-icon icon-left btn-primary btn-sm" > <i class="fas fa-plus"></i> Tambah Artikel</a>
                          </div>
                          <div class="card-body p-0">
                            <div class="table-responsive">
                              <table class="table table-striped table-md">
                                <tbody><tr>
                                  <th>No</th>
                                  <th>Judul</th>
                                  <th>Seo</th>
                                  <th>Deskripsi</th>
                                  <th>Kategori</th>
                                  <th>Tag</th>
                                  <th>Action</th>
                                </tr>
                                @foreach ($articles as $item)
                                    <tr>
                                      <td>{{ $loop->iteration }}</td>
                                      <td>{{ $item->title }}</td>
                                      <td>{{ $item->slug }}</td>
                                      <td>{!! Str::limit($item->body, 150) !!}</td>
                                      <td>{{ $item->category->name }}</td>
                                      <td>
                                          @foreach ($item->tags as $tag)
                                              {{ $tag->name }}
                                          @endforeach
                                      </td>
                                      <td>
                                       <a href="/artikel/{{ $item->slug }}/edit" class="btn btn-icon btn-primary"><i class="far fa-edit"></i></a>

                                          <a href="#" data-id="{{ $item->id }}" class="btn btn-icon btn-danger swal-confirm">
                                            <form action="{{ route('article.delete',$item->id) }}" method="POST" id="delete{{ $item->id }}">
                                              @csrf
                                              @method('delete')
                                              <i class="fas fa-trash" data-id="{{ $item->id }}"></i>
                                            </form>
                                          </a>
                                      </td>
                                    </tr>
                                @endforeach
                                </tbody>
                              </table>
                            </div>
                          </div>
                          <div class="card-footer text-right">
                            <nav class="d-inline-block">
                              <ul class="pagination mb-0">
                                <li class="page-item disabled">
                                  <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                                <li class="page-item">
                                  <a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                  <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                                </li>
                              </ul>
                            </nav>
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
        title: "Apakah Anda yakin?"+id,
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