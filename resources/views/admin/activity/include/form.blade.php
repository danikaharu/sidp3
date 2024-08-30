<div class="row">
    <div class="col-md-12 mb-6">
        <label class="form-label" for="basic-default-fullname">Nama Kegiatan</label>
        <input type="text" name="title" class="form-control @error('title')
            invalid
        @enderror"
            value="{{ isset($activity) ? $activity->title : old('title') }}">
        @error('title')
            <div class="small text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="col-md-12 mb-6">
        <label class="form-label" for="basic-default-company">Isi Kegiatan</label>
        <textarea name="body" rows="3" class="form-control @error('body')
            invalid
        @enderror">{{ isset($activity) ? $activity->body : old('body') }}</textarea>
        @error('body')
            <div class="small text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="col-md-12 mb-6">
        <label class="form-label" for="basic-default-fullname">Keterangan</label>
        <input type="text" name="explanation"
            class="form-control @error('explanation')
            invalid
        @enderror"
            value="{{ isset($activity) ? $activity->explanation : old('explanation') }}">
        @error('explanation')
            <div class="small text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>

    @isset($activity)
        <div class="mb-3 col-md-12">
            <div class="row">
                <div class="col-md-3">
                    @if ($activity->photo == null)
                        <label for="thumbnail" class="form-label">Gambar Lama</label>
                        <img src="https://via.placeholder.com/350?text=No+Image+Avaiable" alt="Thumbnail"
                            class="rounded mb-2 mt-2" alt="Thumbnail" width="200" height="150"
                            style="object-fit: cover">
                    @else
                        <label for="thumbnail" class="form-label">Gambar Lama</label>
                        <img src="{{ asset('storage/upload/kegiatan/' . $activity->photo) }}" alt="Thumbnail"
                            class="rounded mb-2 mt-2" width="200" height="150" style="object-fit: cover">
                    @endif
                </div>
                <div class="col-md-9">
                    <div class="form-group ms-3">
                        <label for="photo" class="form-label">Foto Kegiatan</label>
                        <input class="form-control  @error('photo') is-invalid @enderror" type="file" name="photo" />
                        @error('photo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="col-md-12">
            <div class="mb-3">
                <label class="form-label">Foto Kegiatan</label>
                <input type="file" name="photo"
                    class="form-control @error('photo')
            invalid
        @enderror">
                @error('photo')
                    <div class="small text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    @endisset
</div>
