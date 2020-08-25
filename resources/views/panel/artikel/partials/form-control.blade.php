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
    <select name="" id="kategori" class="form-control">
        <option selecterd disable>Pilih salah satu</option>
        @foreach ($categories as $category)
            <option value="">{{ $category->name }}</option>
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
     Submit
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