<div class="row">
    <div class="col-md-6 mb-6">
        <label class="form-label" for="basic-default-fullname">Nama Kapal</label>
        <input type="text" name="name" class="form-control @error('name')
            invalid
        @enderror"
            value="{{ isset($ship) ? $ship->name : old('name') }}">
        @error('name')
            <div class="small text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="col-md-6 mb-6">
        <label class="form-label" for="basic-default-fullname">Nama Panggilan</label>
        <input type="text" name="call_sign"
            class="form-control @error('call_sign')
            invalid
        @enderror"
            value="{{ isset($ship) ? $ship->call_sign : old('call_sign') }}">
        @error('call_sign')
            <div class="small text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="col-md-6 mb-6">
        <label class="form-label" for="basic-default-fullname">Kapasitas Penumpang</label>
        <input type="text" name="passenger_capacity"
            class="form-control @error('passenger_capacity')
            invalid
        @enderror"
            value="{{ isset($ship) ? $ship->passenger_capacity : old('passenger_capacity') }}">
        @error('passenger_capacity')
            <div class="small text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="col-md-6 mb-6">
        <label class="form-label" for="basic-default-fullname">Kapasitas Kendaraan</label>
        <input type="text" name="vehicle_capacity"
            class="form-control @error('vehicle_capacity')
            invalid
        @enderror"
            value="{{ isset($ship) ? $ship->vehicle_capacity : old('vehicle_capacity') }}">
        @error('vehicle_capacity')
            <div class="small text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="col-md-6 mb-6">
        <label class="form-label" for="basic-default-fullname">Berat Kapal</label>
        <input type="text" name="weight" class="form-control @error('weight')
            invalid
        @enderror"
            value="{{ isset($ship) ? $ship->weight : old('weight') }}">
        @error('weight')
            <div class="small text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="col-md-6 mb-6">
        <label class="form-label" for="basic-default-fullname">Bendera</label>
        <input type="text" name="flag" class="form-control @error('flag')
            invalid
        @enderror"
            value="{{ isset($ship) ? $ship->flag : old('flag') }}">
        @error('flag')
            <div class="small text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="col-md-6 mb-6">
        <label class="form-label" for="basic-default-fullname">Nahkoda</label>
        <input type="text" name="skipper"
            class="form-control @error('skipper')
            invalid
        @enderror"
            value="{{ isset($ship) ? $ship->skipper : old('skipper') }}">
        @error('skipper')
            <div class="small text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="col-md-6 mb-6">
        <label class="form-label" for="basic-default-fullname">Perusahaan</label>
        <input type="text" name="company"
            class="form-control @error('company')
            invalid
        @enderror"
            value="{{ isset($ship) ? $ship->company : old('company') }}">
        @error('company')
            <div class="small text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="col-md-6 mb-6">
        <label class="form-label" for="basic-default-fullname">Nomor IMO</label>
        <input type="text" name="imo_number"
            class="form-control @error('imo_number')
            invalid
        @enderror"
            value="{{ isset($ship) ? $ship->imo_number : old('imo_number') }}">
        @error('imo_number')
            <div class="small text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="col-md-6 mb-6">
        <label class="form-label" for="basic-default-fullname">Jumlah Awak Kapal</label>
        <input type="text" name="crew_number"
            class="form-control @error('crew_number')
            invalid
        @enderror"
            value="{{ isset($ship) ? $ship->crew_number : old('crew_number') }}">
        @error('crew_number')
            <div class="small text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>

    @isset($ship)
        <div class="mb-3 col-md-12">
            <div class="row">
                <div class="col-md-3">
                    @if ($ship->photo == null)
                        <label for="thumbnail" class="form-label">Gambar Lama</label>
                        <img src="https://via.placeholder.com/350?text=No+Image+Avaiable" alt="Thumbnail"
                            class="rounded mb-2 mt-2" alt="Thumbnail" width="200" height="150"
                            style="object-fit: cover">
                    @else
                        <label for="thumbnail" class="form-label">Gambar Lama</label>
                        <img src="{{ asset('storage/upload/kapal/' . $ship->photo) }}" alt="Thumbnail"
                            class="rounded mb-2 mt-2" width="200" height="150" style="object-fit: cover">
                    @endif
                </div>
                <div class="col-md-9">
                    <div class="form-group ms-3">
                        <label for="photo" class="form-label">Foto Kapal</label>
                        <input class="form-control  @error('photo') is-invalid @enderror" type="file"
                            name="photo" />
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
                <label class="form-label">Foto Kapal</label>
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
