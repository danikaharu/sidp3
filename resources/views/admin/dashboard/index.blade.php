@extends('layouts.admin.index')

@section('title', 'Dashboard')

@push('style')
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css' rel='stylesheet' />
@endpush

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h5 class="mb-2">Selamat datang,<span class="h4"> {{ auth()->user()->name }} 👋🏻</span></h5>
        <div class="row mb-4">
            <!-- Kolom Kiri (Kapal dan Pelabuhan) -->
            <div class="col-lg-6 d-flex flex-column">
                @if ($ship)
                    <div class="card mb-4 flex-grow-1">
                        <!-- Card Kapal -->
                        <div class="d-flex align-items-start row">
                            <div class="col-sm-3 text-center text-sm-left">
                                <div class="card-body pb-0 px-2 px-md-3">
                                    <h5 class="card-title text-nowrap text-primary mb-3">{{ $ship->name }}</h5>
                                    <img src="{{ asset('storage/upload/kapal/' . $ship->photo) }}" class="img-fluid"
                                        alt="Kapal">
                                </div>
                            </div>
                            <div class="col-sm-9">
                                <div class="card-body">
                                    <p class="mb-2">{{ $ship->company }}</p>
                                    <p class="mb-2">{{ $ship->flag }}</p>
                                    <p class="mb-2">{{ $ship->weight }} GT</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                @if ($port)
                    <div class="card flex-grow-1">
                        <!-- Card Pelabuhan -->
                        <div class="d-flex align-items-start row">
                            <div class="col-sm-3 text-center text-sm-left">
                                <div class="card-body pb-0 px-2 px-md-3">
                                    <h5 class="card-title text-nowrap text-primary mb-3">Pelabuhan</h5>
                                    <img src="{{ asset('storage/upload/pelabuhan/' . $port->photo) }}" class="img-fluid"
                                        alt="Pelabuhan">
                                </div>
                            </div>
                            <div class="col-sm-9">
                                <div class="card-body">
                                    <p class="card-subtitle mb-2">Nama Pelabuhan: {{ $port->name }}</p>
                                    <p class="card-subtitle mb-2">Alamat: {{ $port->address }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Kolom Kanan (Calendar) -->
            <div class="col-lg-6 d-flex">
                <div class="card w-100">
                    <div class="card-body">
                        <div id="calendar" style="min-height: 300px;"></div>
                    </div>
                </div>
            </div>
        </div>

        @if ($activity)
            <div class="card">
                <div class="d-flex align-items-start row">
                    <div class="col-sm-3 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-6">
                            <img src="{{ asset('storage/upload/kegiatan/' . $activity->photo) }}" class="img-fluid"
                                alt="Activity" />
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="card-body">
                            <h5 class="card-title text-primary mb-3">{{ $activity->title }}</h5>
                            <p class="mb-6">
                                {{ $activity->body }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div>
@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
    <script>
        $(document).ready(function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
            });
            calendar.render();
        });
    </script>
@endpush
