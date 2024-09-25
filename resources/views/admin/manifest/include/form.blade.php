@push('style')
    <link rel="stylesheet" href="{{ asset('template_admin/vendor/libs/select2/select2.css') }}">
@endpush

<div class="row">
    <div class="col-md-6 mb-6">
        <label class="form-label" for="basic-default-fullname">Kapal Tiba</label>
        <select name="schedule_id" class="select2 form-select @error('schedule_id')
        invalid
    @enderror">
            @foreach ($schedules as $schedule)
                <option value="{{ $schedule->id }}"
                    {{ isset($sailingwarrant) && $sailingwarrant->schedule_id == $schedule->id ? 'selected' : (old('schedule_id') == $schedule->id ? 'selected' : '') }}>
                    {{ $schedule->ship->name }} -
                    {{ \Carbon\Carbon::parse($schedule->arrive_time)->format('d F Y H:i') }} -
                    {{ $schedule->originPort->name }} {{ $schedule->destinationPort->name }}
                </option>
            @endforeach
        </select>
        @error('schedule_id')
            <div class="small text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="col-md-6 mb-6">
        <label class="form-label" for="basic-default-fullname">Jenis Manifest</label>
        <select name="type" class="form-select @error('type')
        invalid
    @enderror">
            <option value="" selected dir="">--Pilih Jenis Manifest--</option>
            <option value="1"
                {{ isset($manifest) && $manifest->type == 1 ? 'selected' : (old('type') == '1' ? 'selected' : '') }}>
                Kedatangan</option>
            <option value="2"
                {{ isset($manifest) && $manifest->type == 2 ? 'selected' : (old('type') == '2' ? 'selected' : '') }}>
                Keberangkatan</option>
            <option value="3"
                {{ isset($manifest) && $manifest->type == 3 ? 'selected' : (old('type') == '3' ? 'selected' : '') }}>
                Doking</option>
        </select>
        @error('type')
            <div class="small text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="col-md-6 mb-6">
        <label class="form-label" for="basic-default-fullname">Jumlah Penumpang Dewasa</label>
        <input type="text" name="adult_passenger"
            class="form-control @error('adult_passenger')
        invalid
    @enderror"
            value="{{ isset($manifest) ? $manifest->adult_passenger : old('adult_passenger') }}">
        @error('adult_passenger')
            <div class="small text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="col-md-6 mb-6">
        <label class="form-label" for="basic-default-fullname">Jumlah Penumpang Anak</label>
        <input type="text" name="child_passenger"
            class="form-control @error('child_passenger')
        invalid
    @enderror"
            value="{{ isset($manifest) ? $manifest->child_passenger : old('child_passenger') }}">
        @error('child_passenger')
            <div class="small text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="col-md-6 mb-6">
        <label class="form-label" for="basic-default-fullname">Jumlah Penumpang dengan Kendaraan</label>
        <input type="text" name="vehicle_passenger"
            class="form-control @error('vehicle_passenger')
        invalid
    @enderror"
            value="{{ isset($manifest) ? $manifest->vehicle_passenger : old('vehicle_passenger') }}">
        @error('vehicle_passenger')
            <div class="small text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="col-md-6 mb-6">
        <label class="form-label" for="basic-default-fullname">Golongan I</label>
        <input type="text" name="group_I" class="form-control @error('group_I')
        invalid
    @enderror"
            value="{{ isset($manifest) ? $manifest->group_I : old('group_I') }}">
        @error('group_I')
            <div class="small text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="col-md-6 mb-6">
        <label class="form-label" for="basic-default-fullname">Golongan II</label>
        <input type="text" name="group_II" class="form-control @error('group_II')
        invalid
    @enderror"
            value="{{ isset($manifest) ? $manifest->group_II : old('group_II') }}">
        @error('group_II')
            <div class="small text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="col-md-6 mb-6">
        <label class="form-label" for="basic-default-fullname">Golongan III</label>
        <input type="text" name="group_III" class="form-control @error('group_III')
        invalid
    @enderror"
            value="{{ isset($manifest) ? $manifest->group_III : old('group_III') }}">
        @error('group_III')
            <div class="small text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="col-md-6 mb-6">
        <label class="form-label" for="basic-default-fullname">Golongan IVA</label>
        <input type="text" name="group_IVA" class="form-control @error('group_IVA')
        invalid
    @enderror"
            value="{{ isset($manifest) ? $manifest->group_IVA : old('group_IVA') }}">
        @error('group_IVA')
            <div class="small text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="col-md-6 mb-6">
        <label class="form-label" for="basic-default-fullname">Golongan IVB</label>
        <input type="text" name="group_IVB" class="form-control @error('group_IVB')
        invalid
    @enderror"
            value="{{ isset($manifest) ? $manifest->group_IVB : old('group_IVB') }}">
        @error('group_IVB')
            <div class="small text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="col-md-6 mb-6">
        <label class="form-label" for="basic-default-fullname">Golongan VA</label>
        <input type="text" name="group_VA" class="form-control @error('group_VA')
        invalid
    @enderror"
            value="{{ isset($manifest) ? $manifest->group_VA : old('group_VA') }}">
        @error('group_VA')
            <div class="small text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="col-md-6 mb-6">
        <label class="form-label" for="basic-default-fullname">Golongan VB</label>
        <input type="text" name="group_VB" class="form-control @error('group_VB')
        invalid
    @enderror"
            value="{{ isset($manifest) ? $manifest->group_VB : old('group_VB') }}">
        @error('group_VB')
            <div class="small text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="col-md-6 mb-6">
        <label class="form-label" for="basic-default-fullname">Golongan VIA</label>
        <input type="text" name="group_VIA"
            class="form-control @error('group_VIA')
        invalid
    @enderror"
            value="{{ isset($manifest) ? $manifest->group_VIA : old('group_VIA') }}">
        @error('group_VIA')
            <div class="small text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="col-md-6 mb-6">
        <label class="form-label" for="basic-default-fullname">Golongan VIB</label>
        <input type="text" name="group_VIB"
            class="form-control @error('group_VIB')
        invalid
    @enderror"
            value="{{ isset($manifest) ? $manifest->group_VIB : old('group_VIB') }}">
        @error('group_VIB')
            <div class="small text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="col-md-6 mb-6">
        <label class="form-label" for="basic-default-fullname">Golongan VII</label>
        <input type="text" name="group_VII"
            class="form-control @error('group_VII')
        invalid
    @enderror"
            value="{{ isset($manifest) ? $manifest->group_VII : old('group_VII') }}">
        @error('group_VII')
            <div class="small text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="col-md-6 mb-6">
        <label class="form-label" for="basic-default-fullname">Golongan VIII</label>
        <input type="text" name="group_VIII"
            class="form-control @error('group_VIII')
        invalid
    @enderror"
            value="{{ isset($manifest) ? $manifest->group_VIII : old('group_VIII') }}">
        @error('group_VIII')
            <div class="small text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="col-md-6 mb-6">
        <label class="form-label" for="basic-default-fullname">Golongan IX</label>
        <input type="text" name="group_IX" class="form-control @error('group_IX')
        invalid
    @enderror"
            value="{{ isset($manifest) ? $manifest->group_IX : old('group_IX') }}">
        @error('group_IX')
            <div class="small text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="col-md-6 mb-6">
        <label class="form-label" for="basic-default-fullname">Load Factor Penumpang</label>
        <input type="text" name="load_factor_passenger"
            class="form-control @error('load_factor_passenger')
        invalid
    @enderror"
            value="{{ isset($manifest) ? $manifest->load_factor_passenger : old('load_factor_passenger') }}">
        @error('load_factor_passenger')
            <div class="small text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="col-md-6 mb-6">
        <label class="form-label" for="basic-default-fullname">Load Factor Kendaraan</label>
        <input type="text" name="load_factor_vehicle"
            class="form-control @error('load_factor_vehicle')
        invalid
    @enderror"
            value="{{ isset($manifest) ? $manifest->load_factor_vehicle : old('load_factor_vehicle') }}">
        @error('load_factor_vehicle')
            <div class="small text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="col-md-6 mb-6">
        <label class="form-label" for="basic-default-fullname">Barang Curah (Ton)</label>
        <input type="text" name="bulk_goods"
            class="form-control @error('bulk_goods')
        invalid
    @enderror"
            value="{{ isset($manifest) ? $manifest->bulk_goods : old('bulk_goods') }}">
        @error('bulk_goods')
            <div class="small text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="col-md-6 mb-6">
        <label class="form-label" for="basic-default-fullname">Barang Curah (Keterangan)</label>
        <input type="text" name="description_bulk_goods"
            class="form-control @error('description_bulk_goods')
        invalid
    @enderror"
            value="{{ isset($manifest) ? $manifest->description_bulk_goods : old('description_bulk_goods') }}">
        @error('description_bulk_goods')
            <div class="small text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="col-md-6 mb-6">
        <label class="form-label" for="basic-default-fullname">Situasi</label>
        <input type="text" name="situation"
            class="form-control @error('situation')
        invalid
    @enderror"
            value="{{ isset($manifest) ? $manifest->situation : old('situation') }}">
        @error('situation')
            <div class="small text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    @isset($manifest)
        <div class="mb-3 col-md-12">
            <div class="row">
                <div class="col-md-3">
                    @if ($manifest->file == null)
                        <label for="file" class="form-label">File Lama</label>
                        <img src="https://via.placeholder.com/350?text=File+Tidak+Ditemukan" alt="File Manifest"
                            class="rounded mb-2 mt-2" alt="File Manifest" width="200" height="150"
                            style="object-fit: cover">
                    @else
                        <label for="file" class="form-label">File Lama</label>
                        <div class="form-group">
                            <a href="{{ asset('storage/upload/manifest/' . $manifest->file) }}" target="pdf-frame"
                                class="btn btn-outline-dark btn-sm"><i class="bx bxs-file-pdf me-1"></i>Lihat File</a>
                        </div>
                    @endif
                </div>
                <div class="col-md-9">
                    <div class="form-group ms-3">
                        <label for="file" class="form-label">File Manifest</label>
                        <input class="form-control @error('file') is-invalid @enderror" type="file" name="file" />
                        @error('file')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="col-md-12">
            <div class="mb-3">
                <label class="form-label">File Manifest</label>
                <input type="file" name="file"
                    class="form-control @error('file')
            invalid
        @enderror">
                @error('file')
                    <div class="small text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    @endisset
</div>

@push('script')
    <script src="{{ asset('template_admin/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('template_admin/vendor/js/forms-selects.js') }}"></script>
@endpush
