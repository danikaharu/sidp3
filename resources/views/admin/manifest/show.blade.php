@extends('layouts.admin.index')

@section('title')
    Manifest
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Dashboard /</span> Manifest
        </h4>

        <ul class="nav nav-pills flex-column flex-md-row mb-3">
            <li class="nav-item"><a class="nav-link active" href="{{ route('admin.manifest.index') }}"><i
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
                            <td><strong>Jenis SPB</strong></td>
                            <td>{{ $manifest->type() }}</td>
                        </tr>
                        <tr>
                            <td><strong>Jadwal</strong></td>
                            <td>{{ \Carbon\Carbon::parse($manifest->schedule->arrive_time)->format('l, d F Y H:i') }}</td>
                        </tr>
                        <tr>
                            <td><strong>Kapal</strong></td>
                            <td>{{ $manifest->schedule->ship->name }}</td>
                        </tr>
                        <tr>
                            <td><strong>Penumpang Dewasa</strong></td>
                            <td>{{ $manifest->adult_passenger }}</td>
                        </tr>
                        <tr>
                            <td><strong>Penumpang Anak</strong></td>
                            <td>{{ $manifest->child_passenger }}</td>
                        </tr>
                        <tr>
                            <td><strong>Penumpang Kendaraan</strong></td>
                            <td>{{ $manifest->vehicle_passenger }}</td>
                        </tr>
                        <tr>
                            <td><strong>Golongan I</strong></td>
                            <td>{{ $manifest->group_I }}</td>
                        </tr>
                        <tr>
                            <td><strong>Golongan II</strong></td>
                            <td>{{ $manifest->group_II }}</td>
                        </tr>
                        <tr>
                            <td><strong>Golongan III</strong></td>
                            <td>{{ $manifest->group_III }}</td>
                        </tr>
                        <tr>
                            <td><strong>Golongan IV A</strong></td>
                            <td>{{ $manifest->group_IVA }}</td>
                        </tr>
                        <tr>
                            <td><strong>Golongan IV B</strong></td>
                            <td>{{ $manifest->group_IVB }}</td>
                        </tr>
                        <tr>
                            <td><strong>Golongan V A</strong></td>
                            <td>{{ $manifest->group_VA }}</td>
                        </tr>
                        <tr>
                            <td><strong>Golongan V B</strong></td>
                            <td>{{ $manifest->group_VB }}</td>
                        </tr>
                        <tr>
                            <td><strong>Golongan VI A</strong></td>
                            <td>{{ $manifest->group_VIA }}</td>
                        </tr>
                        <tr>
                            <td><strong>Golongan VI B</strong></td>
                            <td>{{ $manifest->group_VIB }}</td>
                        </tr>
                        <tr>
                            <td><strong>Golongan VII</strong></td>
                            <td>{{ $manifest->group_VII }}</td>
                        </tr>
                        <tr>
                            <td><strong>Golongan VIII</strong></td>
                            <td>{{ $manifest->group_VIII }}</td>
                        </tr>
                        <tr>
                            <td><strong>Golongan IX</strong></td>
                            <td>{{ $manifest->group_IX }}</td>
                        </tr>
                        <tr>
                            <td><strong>Load Factor Penumpang</strong></td>
                            <td>{{ $manifest->load_factor_passenger }}</td>
                        </tr>
                        <tr>
                            <td><strong>Load Factor Kendaraan</strong></td>
                            <td>{{ $manifest->load_factor_vehicle }}</td>
                        </tr>
                        <tr>
                            <td><strong>Barang Curah (Ton)</strong></td>
                            <td>{{ $manifest->bulk_goods }}</td>
                        </tr>
                        <tr>
                            <td><strong>Barang Curah (Keterangan)</strong></td>
                            <td>{{ $manifest->description_bulk_goods }}</td>
                        </tr>
                        <tr>
                            <td><strong>Situasi</strong></td>
                            <td>{{ $manifest->situation }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
