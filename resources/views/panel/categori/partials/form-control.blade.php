<div class="form-group">
    <label for="">Nama kategori</label>
    <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ $category->name }}">
</div>
@error('name')
<small class="text-danger">
    {{ $message }}
</small>
@enderror
</div>
<div class="card-footer">
    <button class="btn btn-primary" type="submit">
        {{ $submit ?? 'update' }}
    </button>
</div>