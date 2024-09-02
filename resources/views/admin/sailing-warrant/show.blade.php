@extends('layouts.admin.index')

@section('title')
    SPB
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Dashboard /</span> SPB
        </h4>

        <ul class="nav nav-pills flex-column flex-md-row mb-3">
            <li class="nav-item"><a class="nav-link active" href="{{ route('admin.sailingwarrant.index') }}"><i
                        class="bx bx-arrow-back me-1"></i>
                    Kembali</a></li>
        </ul>

        <div class="card">
            <div class="card-body">
                <table class="table table-responsive-sm table-hover table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Nama</th>
                            <th scope="col">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Nomor Cetak SPB</strong></td>
                            <td>{{ $sailingwarrant->print_number }}</td>
                        </tr>
                        <tr>
                            <td><strong>Kapal</strong></td>
                            <td>{{ $sailingwarrant->ship->name }}</td>
                        </tr>
                        <tr>
                            <td><strong>Nomor SPB Tiba</strong></td>
                            <td>{{ $sailingwarrant->arrive_number }}</td>
                        </tr>
                        <tr>
                            <td><strong>Nomor SPB Tolak</strong></td>
                            <td>{{ $sailingwarrant->departure_number }}</td>
                        </tr>
                        <tr>
                            <td><strong>Nomor Cetak SPB</strong></td>
                            <td>{{ $sailingwarrant->print_number }}</td>
                        </tr>
                        <tr>
                            <td><strong>Waktu Tiba</strong></td>
                            <td>{{ $sailingwarrant->arrive_time }}</td>
                        </tr>
                        <tr>
                            <td><strong>Waktu Tolak</strong></td>
                            <td>{{ $sailingwarrant->departure_time }}</td>
                        </tr>
                        <tr>
                            <td><strong>Pelabuhan Asal</strong></td>
                            <td>{{ $sailingwarrant->originPort->name }}</td>
                        </tr>
                        <tr>
                            <td><strong>Pelabuhan Tujuan</strong></td>
                            <td>{{ $sailingwarrant->destinationPort->name }}</td>
                        </tr>
                        <tr>
                            <td><strong>Situasi</strong></td>
                            <td>{{ $sailingwarrant->situation }}</td>
                        </tr>
                        <tr>
                            <td><strong>File</strong></td>
                            <td>
                                <a href="{{ asset('storage/upload/spb/' . $sailingwarrant->file) }}" target="pdf-frame"
                                    class="btn btn-dark btn-sm">
                                    <i class="bx bxs-file-pdf">
                                        Lihat File
                                    </i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
