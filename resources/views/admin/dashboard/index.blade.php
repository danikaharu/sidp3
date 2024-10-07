@extends('layouts.admin.index')

@section('title', 'Dashboard')

@push('style')
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css' rel='stylesheet' />
@endpush

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h5 class="mb-2">Selamat datang,<span class="h4"> {{ auth()->user()->name }} 👋🏻</span></h5>
        <div class="row">
            <div class="col-lg-6 mb-6">
                <div class="card mb-2">
                    <div class="d-flex align-items-end row">
                        <div class="col-7">
                            <div class="card-body">
                                <h5 class="card-title mb-3 text-nowrap text-primary">{{ $ship->name }}</h5>
                                <img src="{{ asset('storage/upload/kapal/' . $ship->photo) }}" class="img-fluid"
                                    alt="Kapal">
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="card-body">
                                <p class="card-subtitle text-nowrap mb-3">{{ $ship->company }}</p>
                                <p class="card-subtitle text-nowrap mb-3">{{ $ship->flag }}</p>
                                <p class="card-subtitle text-nowrap mb-3">{{ $ship->weight }} GT</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-7">
                            <div class="card-body">
                                <h5 class="card-title mb-3 text-nowrap text-primary">Pelabuhan</h5>
                                <img src="{{ asset('storage/upload/pelabuhan/' . $port->photo) }}" class="img-fluid"
                                    alt="Pelabuhan">
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="card-body">
                                <p class="card-subtitle text-nowrap mb-3">Nama Pelabuhan : {{ $port->name }}</p>
                                <p class="card-subtitle text-nowrap mb-3">Alamat : {{ $port->address }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-6">
                <div class="card h-100">
                    <div class="card-body">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
        </div>
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
