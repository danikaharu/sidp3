@push('style')
    <link rel="stylesheet" href="{{ asset('template_admin/vendor/libs/select2/select2.css') }}">
@endpush

<div class="row">
    <div class="col-md-6 mb-6">
        <label class="form-label" for="basic-default-fullname">Nomor Cetak SPB</label>
        <input type="text" name="print_number" class="form-control @error('print_number')
        invalid
    @enderror"
            value="{{ isset($sailingwarrant) ? $sailingwarrant->print_number : old('print_number') }}">
        @error('print_number')
            <div class="small text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="col-md-6 mb-6">
        <label class="form-label" for="basic-default-fullname">Jadwal Keberangkatan</label>
        <select name="schedule_id" class="select2 form-select @error('schedule_id')
        invalid
    @enderror">
            @foreach ($schedules as $schedule)
                <option value="{{ $schedule->id }}"
                    {{ isset($sailingwarrant) && $sailingwarrant->schedule_id == $schedule->id ? 'selected' : (old('schedule_id') == $schedule->id ? 'selected' : '') }}>
                    {{ $schedule->ship->name }} -
                    {{ \Carbon\Carbon::parse($schedule->time)->format('d F Y H:i') }} -
                    {{ $schedule->originPort->name }} {{ $schedule->destinationPort->name }}</option>
            @endforeach
        </select>
        @error('schedule_id')
            <div class="small text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="col-md-6 mb-6">
        <label class="form-label" for="basic-default-fullname">Nomor SPB Tiba</label>
        <input type="text" name="arrive_number"
            class="form-control @error('arrive_number')
        invalid
    @enderror"
            value="{{ isset($sailingwarrant) ? $sailingwarrant->arrive_number : old('arrive_number') }}">
        @error('arrive_number')
            <div class="small text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="col-md-6 mb-6">
        <label class="form-label" for="basic-default-fullname">Nomor SPB Berangkat</label>
        <input type="text" name="departure_number"
            class="form-control @error('departure_number')
        invalid
    @enderror"
            value="{{ isset($sailingwarrant) ? $sailingwarrant->departure_number : old('departure_number') }}">
        @error('departure_number')
            <div class="small text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="col-md-12 mb-6">
        <label class="form-label" for="basic-default-fullname">Keterangan</label>
        <input type="text" name="situation" class="form-control @error('situation')
        invalid
    @enderror"
            value="{{ isset($sailingwarrant) ? $sailingwarrant->situation : old('situation') }}">
        @error('situation')
            <div class="small text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>

    @isset($sailingwarrant)
        <div class="mb-3 col-md-12">
            <div class="row">
                <div class="col-md-3">
                    @if ($sailingwarrant->file == null)
                        <label for="file" class="form-label">File Lama</label>
                        <img src="https://via.placeholder.com/350?text=File+Tidak+Ditemukan" alt="File SPB"
                            class="rounded mb-2 mt-2" alt="File SPB" width="200" height="150"
                            style="object-fit: cover">
                    @else
                        <label for="file" class="form-label">File Lama</label>
                        <div class="form-group">
                            <a href="{{ asset('storage/upload/spb/' . $sailingwarrant->file) }}" target="pdf-frame"
                                class="btn btn-outline-dark btn-sm"><i class="bx bxs-file-pdf me-1"></i>Lihat File</a>
                        </div>
                    @endif
                </div>
                <div class="col-md-9">
                    <div class="form-group ms-3">
                        <label for="file" class="form-label">File SPB</label>
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
                <label class="form-label">File SPB</label>
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
