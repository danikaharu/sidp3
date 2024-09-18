@extends('layouts.admin.index')

@section('title', 'Manifest')

@push('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
    <style>
        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_info {
            margin-left: 1rem;
        }

        .dataTables_wrapper .dataTables_filter,
        .dataTables_wrapper .dataTables_paginate {
            margin-right: 1rem;
        }
    </style>
@endpush

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Responsive Table -->
        <div class="card">
            <div class="card-header">
                <h5>Data Manifest</h5>
                <div class="flex">
                    <a class="btn btn-primary" href="{{ route('admin.manifest.create') }}"><i
                            class="bx bx-plus me-1"></i>Tambah
                        Manifest</a>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#reportByShipModal"><i class="bx bx-printer me-1"></i>Cetak Per Kapal</button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#reportByMonthModal"><i class="bx bx-printer me-1"></i>Cetak Per Bulan</button>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table" id="listData">
                    <thead>
                        <tr class="text-nowrap">
                            <th>#</th>
                            <th>Jenis Manifest</th>
                            <th>Kapal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <!--/ Responsive Table -->
    </div>

    <!-- Report By Ship Modal -->
    <div class="modal fade" id="reportByShipModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-simple modal-print">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel5">Cetak SPB Per Kapal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.manifests.report.byShip') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="row g-6">
                            <div class="col mb-0">
                                <label for="startDate" class="form-label">Kapal</label>
                                <select style="cursor:pointer;" class="form-select" name="ship_id">
                                    <option disabled selected>-- Pilih Kapal --</option>
                                    @foreach ($ships as $ship)
                                        <option value="{{ $ship->id }}">{{ $ship->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col mb-0">
                                <label for="startDate" class="form-label">Bulan</label>
                                <select style="cursor:pointer;" class="form-select" name="month">
                                    <option disabled selected>-- Pilih Bulan --</option>
                                    @php
                                        for ($m = 1; $m <= 12; ++$m) {
                                            $month_label = date('F', mktime(0, 0, 0, $m, 1));
                                            echo '<option value=' . $m . '>' . $month_label . '</option>';
                                        }
                                    @endphp
                                </select>
                            </div>
                            <div class="col mb-0">
                                <label for="endDate" class="form-label">Tahun</label>
                                <select style="cursor:pointer;" class="form-select" name="year">
                                    <option disabled selected>-- Pilih Tahun --</option>
                                    @php
                                        $year = date('Y');
                                        $min = $year - 5;
                                        $max = $year;
                                        for ($i = $max; $i >= $min; $i--) {
                                            echo '<option value=' . $i . '>' . $i . '</option>';
                                        }
                                    @endphp
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Cetak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--/ Report By Ship Modal -->

    <!-- Report By Month Modal -->
    <div class="modal fade" id="reportByMonthModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-simple modal-print">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel5">Cetak SPB Per Bulan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.manifests.report.byMonth') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="row g-6">
                            <div class="col mb-2">
                                <label for="startDate" class="form-label">Bulan</label>
                                <select style="cursor:pointer;" class="form-select" name="month">
                                    <option disabled selected>-- Pilih Bulan --</option>
                                    @php
                                        for ($m = 1; $m <= 12; ++$m) {
                                            $month_label = date('F', mktime(0, 0, 0, $m, 1));
                                            echo '<option value=' . $m . '>' . $month_label . '</option>';
                                        }
                                    @endphp
                                </select>
                            </div>
                            <div class="col mb-2">
                                <label for="endDate" class="form-label">Tahun</label>
                                <select style="cursor:pointer;" class="form-select" name="year">
                                    <option disabled selected>-- Pilih Tahun --</option>
                                    @php
                                        $year = date('Y');
                                        $min = $year - 5;
                                        $max = $year;
                                        for ($i = $max; $i >= $min; $i--) {
                                            echo '<option value=' . $i . '>' . $i . '</option>';
                                        }
                                    @endphp
                                </select>
                            </div>
                        </div>
                        <div class="row g-6">
                            <div class="col mb-0">
                                <label for="letter_number" class="form-label">Nomor Surat</label>
                                <input type="text" name="letter_number" class="form-control">
                            </div>
                            <div class="col mb-0">
                                <label for="letter_date" class="form-label">Tanggal Surat</label>
                                <input type="text" name="letter_date" class="form-control">
                            </div>
                        </div>
                        <div class="row g-6">
                            <div class="col mb-0">
                                <label for="official_name" class="form-label">Nama Pejabat</label>
                                <input type="text" name="official_name" class="form-control">
                            </div>
                            <div class="col mb-0">
                                <label for="official_nip" class="form-label">NIP Pejabat</label>
                                <input type="text" name="official_nip" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Cetak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--/ Report By Month Modal -->
@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js" defer></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js" defer></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js" defer></script>
    <script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js" defer></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            $('#listData').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                ajax: '{{ url()->current() }}',
                columns: [{
                        data: 'DT_RowIndex'
                    }, {
                        data: 'type',
                    }, {
                        data: 'ship',
                    },
                    {
                        data: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
            });

            // Sweet Alert Delete
            $("body").on('submit', `form[role='alert']`, function(event) {
                event.preventDefault();

                Swal.fire({
                    title: $(this).attr('alert-title'),
                    text: $(this).attr('alert-text'),
                    icon: "warning",
                    allowOutsideClick: false,
                    showCancelButton: true,
                    cancelButtonText: "Batal",
                    reverseButton: true,
                    confirmButtonText: "Hapus",
                }).then((result) => {
                    if (result.isConfirmed) {
                        event.target.submit();
                    }
                })
            });
        });
    </script>
@endpush
