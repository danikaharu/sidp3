<div class="row">
    <div class="col-md-12 mb-6">
        <label class="form-label" for="basic-default-fullname">Nama Pelabuhan</label>
        <input type="text" name="name" class="form-control @error('name')
            invalid
        @enderror"
            value="{{ isset($port) ? $port->name : old('name') }}">
        @error('name')
            <div class="small text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>

    @isset($port)
        <div class="mb-3 col-md-12">
            <div class="row">
                <div class="col-md-3">
                    @if ($port->photo == null)
                        <label for="thumbnail" class="form-label">Gambar Lama</label>
                        <img src="https://via.placeholder.com/350?text=No+Image+Avaiable" alt="Thumbnail"
                            class="rounded mb-2 mt-2" alt="Thumbnail" width="200" height="150"
                            style="object-fit: cover">
                    @else
                        <label for="thumbnail" class="form-label">Gambar Lama</label>
                        <img src="{{ asset('storage/upload/pelabuhan/' . $port->photo) }}" alt="Thumbnail"
                            class="rounded mb-2 mt-2" width="200" height="150" style="object-fit: cover">
                    @endif
                </div>
                <div class="col-md-9">
                    <div class="form-group ms-3">
                        <label for="photo" class="form-label">Foto Pelabuhan</label>
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
                <label class="form-label">Foto Pelabuhan</label>
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
    <div class="col-md-12 mb-6">
        <label class="form-label" for="basic-default-company">Alamat</label>
        <textarea name="address" rows="3" class="form-control @error('address')
            invalid
        @enderror">{{ isset($port) ? $port->address : old('address') }}</textarea>
        @error('address')
            <div class="small text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
