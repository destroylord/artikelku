<div class="form-group">
    <label for="judul">Judul</label>
    <input id="judul" class="form-control" type="text" name="title" value="{{ old('title') ??$article->title }}">
    @error('title')
    <small class="text-danger">
        {{ $message }}
    </small>
    @enderror
</div>
<div class="form-group">
    <label for="Deskripsi">Deskripsi</label>
   <textarea name="body" class="form-control" id="editor" cols="40" rows="50">{{ old('body') ??$article->body }}</textarea>
   @error('body')
   <small class="text-danger">
       {{ $message }}
   </small>
   @enderror
</div>
<div class="form-group">
    <label for="Kategori">Kategori</label>
    <select name="category_id" id="kategori" class="form-control">
        @foreach ($categories as $category)
            <option {{ $category->id == $article->category_id ? 'selected' : ''}} value="{{ $category->id }}">{{ $category->name }}</option>            
        @endforeach

    </select>
</div>
<div class="form-group">
    <label for="tags">Tags</label> 
    <!-- Options -->
    {{-- <select id="multiple" multiple name="tag[]">
        @foreach ($tags as $tag)
            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
        @endforeach
    </select> --}}
</div>

</div>
<div class="card-footer">
    <button class="btn btn-primary" type="submit">
     {{ $submit ?? 'update' }}
    </button>
</div>
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