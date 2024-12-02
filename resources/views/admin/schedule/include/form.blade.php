@push('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endpush

<div class="row">
    <div class="col-md-12 mb-6">
        <label class="form-label" for="basic-default-fullname">Kapal</label>
        <select name="ship_id" class="form-select @error('ship_id')
        invalid
    @enderror">
            <option value="">--Pilih Kapal--</option>
            @foreach ($ships as $ship)
                <option value="{{ $ship->id }}"
                    {{ isset($schedule) && $schedule->ship_id == $ship->id ? 'selected' : (old('ship_id') == $ship->id ? 'selected' : '') }}>
                    {{ $ship->name }}</option>
            @endforeach
        </select>
        @error('ship_id')
            <div class="small text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="col-md-6 mb-6">
        <label class="form-label" for="basic-default-fullname">Waktu</label>
        <input type="text" name="time"
            class="form-control @error('time')
            invalid
        @enderror time"
            value="{{ isset($schedule) ? $schedule->time : old('time') }}">
        @error('time')
            <div class="small text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="col-md-6 mb-6">
        <label class="form-label" for="recurrence[type]">Pengulangan</label>
        <select name="recurrence[type]"class="form-select @error('recurrence[type]') is-invalid @enderror">
            <option disabled selected>--Pilih Pengulangan--</option>
            <option value="" {{ old('recurrence[type]') == '' ? 'selected' : '' }}>Tidak Ada</option>
            <option value="weekly" {{ old('recurrence[type]') == 'weekly' ? 'selected' : '' }}>Mingguan</option>
        </select>
        @error('recurrence[type]')
            <div class="small text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6 mb-6">
        <label class="form-label" for="basic-default-fullname">Pelabuhan Asal</label>
        <select name="origin_port" class="form-select @error('origin_port')
        invalid
    @enderror">
            <option value="">--Pilih Pelabuhan--</option>
            @foreach ($ports as $port)
                <option value="{{ $port->id }}"
                    {{ isset($schedule) && $schedule->origin_port == $port->id ? 'selected' : (old('origin_port') == $port->id ? 'selected' : '') }}>
                    {{ $port->name }}</option>
            @endforeach
        </select>
        @error('origin_port')
            <div class="small text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="col-md-6 mb-6">
        <label class="form-label" for="basic-default-fullname">Pelabuhan Tujuan</label>
        <select name="destination_port" class="form-select @error('destination_port')
        invalid
    @enderror">
            <option value="">--Pilih Pelabuhan--</option>
            @foreach ($ports as $port)
                <option value="{{ $port->id }}"
                    {{ isset($schedule) && $schedule->destination_port == $port->id ? 'selected' : (old('destination_port') == $port->id ? 'selected' : '') }}>
                    {{ $port->name }}</option>
            @endforeach
        </select>
        @error('destination_port')
            <div class="small text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>

    <input type="hidden" name="type" value="{{ isset($schedule) ? $schedule->type : $type }}">
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
