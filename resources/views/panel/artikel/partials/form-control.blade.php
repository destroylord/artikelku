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
        <option selected disabled value="">Pilih salah satu</option>
        @foreach ($categories as $category)
            <option {{ $category->id == $article->category_id ? 'selected' : ''}} value="{{ $category->id }}">{{ $category->name }}</option>            
        @endforeach

    </select>
</div>
<div class="form-group">
    <label for="tags">Tags</label> 
    <!-- Options -->
    <select id="multiple" multiple name="tags[]" class="form-control js-example-basic-multiple">
        @foreach ($article->tags as $tag) 
            <option selected value="{{ $tag->id }}">{{ $tag->name }}</option>
        @endforeach
        @foreach ($tags as $tag)
           <option value="{{ $tag->id }}">{{ $tag->name }}</option> 
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="thumbnail">Thumbnail</label>
    <div class="custom-file">
        <input type="file" class="custom-file-input" id="inputGroupFile02" name="thumbnail"/>
        <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
        <img id="blah" src="#" alt="your image" class="img-fluid mt-4" width="200" height="200"/>
    </div>
</div>
<br>
<div class="card-footer text-right">
    <button class="btn btn-primary" type="submit">
     {{ $submit ?? 'update' }}
    </button>
</div>
@push('scripts')
<script>
$(function(){
    CKEDITOR.replace( 'editor' );
    $('.js-example-basic-multiple').select2({
        placeholder : 'pilih saja'
    });
    $('#inputGroupFile02').on('change',function(){
        //get the file name
        var fileName = $(this).val().replace('C:\\fakepath\\', " ");
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(fileName);
    });
});

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

$("#inputGroupFile02").change(function() {
  readURL(this);
});

</script>
@endpush