@push('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endpush

<div class="row">
    <div class="col-md-6 mb-6">
        <label class="form-label" for="basic-default-fullname">Kode Barang</label>
        <input type="text" name="code" class="form-control @error('code')
            invalid
        @enderror"
            value="{{ isset($cargo) ? $cargo->code : old('code') }}">
        @error('code')
            <div class="small text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="col-md-6 mb-6">
        <label class="form-label" for="basic-default-fullname">Nam Barang</label>
        <input type="text" name="name" class="form-control @error('name')
            invalid
        @enderror"
            value="{{ isset($cargo) ? $cargo->name : old('name') }}">
        @error('name')
            <div class="small text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="col-md-6 mb-6">
        <label class="form-label" for="basic-default-fullname">Nama Pemilik</label>
        <input type="text" name="owner" class="form-control @error('owner')
            invalid
        @enderror"
            value="{{ isset($cargo) ? $cargo->owner : old('owner') }}">
        @error('owner')
            <div class="small text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="col-md-6 mb-6">
        <label class="form-label" for="basic-default-fullname">Berat</label>
        <input type="text" name="weight" class="form-control @error('weight')
            invalid
        @enderror"
            value="{{ isset($cargo) ? $cargo->weight : old('weight') }}">
        @error('weight')
            <div class="small text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <input type="hidden" name="manifest_id" value="{{ isset($cargo) ? $cargo->manifest_id : $manifest_id }}">
</div>

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        $(".time").flatpickr({
            enableTime: true,
            time_24hr: true,
        });
    </script>
@endpush
