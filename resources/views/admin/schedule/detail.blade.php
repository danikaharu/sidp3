@extends('layouts.admin.index')

@section('title', 'Detail Jadwal')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="card">
            <div class="card-header">
                <h5>Detail Jadwal</h5>
                <a href="{{ url()->previous() }}" class="btn btn-secondary mb-3">
                    <i class="bx bx-arrow-back"></i> Kembali
                </a>
            </div>
            <div class="table-responsive text-nowrap">
                @if ($schedules->isEmpty())
                    <p>Tidak ada jadwal untuk kapal ini di bulan yang dipilih.</p>
                @else
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kapal</th>
                                <th>Pelabuhan Asal</th>
                                <th>Pelabuhan Tujuan</th>
                                <th>Waktu</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($schedules as $key => $schedule)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $schedule->ship->name }}</td>
                                    <td>{{ $schedule->originPort->name }}</td>
                                    <td>{{ $schedule->destinationPort->name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($schedule->time)->format('d F Y H:i') }}</td>
                                    <td>
                                        <div class="d-flex">
                                            @can('edit schedule')
                                                <a class="btn btn-warning me-2"
                                                    href="{{ route('admin.schedules.edit', $schedule->id) }}"><i
                                                        class="bx bx-edit-alt me-1"></i>
                                                    Edit</a>
                                            @endcan

                                            @can('delete schedule')
                                                <form action="{{ route('admin.schedules.destroy', $schedule->id) }}"
                                                    method="POST" role="alert" alert-title="Hapus Data"
                                                    alert-text="Yakin ingin menghapusnya?">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger me-2"><i
                                                            class="bx bx-trash">Hapus</i>
                                                    </button>
                                                </form>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection
