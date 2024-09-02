<div class="row">
    <div class="col-md-6 mb-6">
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
        <label class="form-label" for="basic-default-fullname">Hari</label>
        <input type="text" name="day" class="form-control @error('day')
            invalid
        @enderror"
            value="{{ isset($schedule) ? $schedule->day : old('day') }}">
        @error('day')
            <div class="small text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="col-md-4 mb-6">
        <label class="form-label" for="basic-default-fullname">Lintasan</label>
        <input type="text" name="track" class="form-control @error('track')
            invalid
        @enderror"
            value="{{ isset($schedule) ? $schedule->track : old('track') }}">
        @error('track')
            <div class="small text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="col-md-4 mb-6">
        <label class="form-label" for="basic-default-fullname">Jarak</label>
        <input type="text" name="distance"
            class="form-control @error('distance')
            invalid
        @enderror"
            value="{{ isset($schedule) ? $schedule->distance : old('distance') }}">
        @error('distance')
            <div class="small text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="col-md-4 mb-6">
        <label class="form-label" for="basic-default-fullname">Waktu</label>
        <input type="text" name="time" class="form-control @error('time')
            invalid
        @enderror"
            value="{{ isset($schedule) ? $schedule->time : old('time') }}">
        @error('time')
            <div class="small text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>

</div>
