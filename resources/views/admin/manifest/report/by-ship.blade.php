<html>

<head>
    <title>Laporan Produksi | SIDP3</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        .table-border {
            border: 1px solid black;
            border-collapse: collapse;
            width: 100%;
        }

        .table-border tr td,
        .table-border tr th {
            border: 1px solid black;
            padding: 3px;
            width: auto;
        }
    </style>

    <center>
        <h5 style="margin: 0;">LAPORAN DATA PRODUKSI</h5>
        <h5 style="margin: 0;">SATUAN PELAYANAN PELABUHAN PENYEBERANGAN GORONTALO</h5>
        <h5 style="margin: 0;">BULAN {{ $month_name }} {{ $year }}</h5>
    </center>

    <div style="margin: 5% 0;">
        <table class='table-border'>
            <thead>
                <tr>
                    <th colspan="30" style="text-align: center;background-color: blue;color: white;">KEDATANGAN</th>
                </tr>
                <tr>
                    <th rowspan="3" style="text-align:center;vertical-align:middle;">No.</th>
                    <th rowspan="3" style="text-align:center;vertical-align:middle;">Hari</th>
                    <th rowspan="3" style="text-align:center;vertical-align:middle;">Tanggal</th>
                    <th rowspan="3" style="text-align:center;vertical-align:middle;">Kapal KMP.</th>
                    <th colspan="2" style="text-align:center;vertical-align:middle;">Kapasitas</th>
                    <th rowspan="3" style="text-align:center;vertical-align:middle;">Trip</th>
                    <th colspan="2" style="text-align:center;vertical-align:middle;">Penumpang</th>
                    <th rowspan="3" style="text-align:center;vertical-align:middle;background-color: yellow;">Jml Pnp
                    </th>
                    <th rowspan="3" style="text-align:center;vertical-align:middle;background-color: yellow;">Jm. Pnp
                        dlm Kend</th>
                    <th rowspan="3" style="text-align:center;vertical-align:middle;background-color: yellow;">Jm. Pnp
                        Total</th>
                    <th colspan="3" style="text-align:center;vertical-align:middle;">Kendaraan Gol. I s/d III</th>
                    <th rowspan="3" style="text-align:center;vertical-align:middle;background-color: yellow;">Jml.
                        Kend Gol. I, II, III</th>
                    <th colspan="9" style="text-align:center;vertical-align:middle;">Kendaraan Gol. IV s/d IX</th>
                    <th rowspan="3" style="text-align:center;vertical-align:middle;background-color: yellow;">Jml.
                        Kend. Gol. IV s/d IX</th>
                    <th colspan="2" style="text-align:center;vertical-align:middle;background-color: yellow;">Load
                        Factor (%)</th>
                    <th colspan="2" style="text-align:center;vertical-align:middle;background-color: yellow;">Barang
                        Curah (Ton)</th>
                </tr>
                <tr>
                    <th rowspan="2" style="text-align:center;vertical-align:middle;">Pnp</th>
                    <th rowspan="2" style="text-align:center;vertical-align:middle;">Kend Gol. IV / ></th>
                    <th rowspan="2" style="text-align:center;vertical-align:middle;">Dewasa</th>
                    <th rowspan="2" style="text-align:center;vertical-align:middle;">Anak</th>
                    <th rowspan="2" style="text-align:center;vertical-align:middle;">Gol. I</th>
                    <th rowspan="2" style="text-align:center;vertical-align:middle;">Gol. II</th>
                    <th rowspan="2" style="text-align:center;vertical-align:middle;">Gol. III</th>
                    <th colspan="2" style="text-align:center;vertical-align:middle;">Gol. IV</th>
                    <th colspan="2" style="text-align:center;vertical-align:middle;">Gol. V</th>
                    <th colspan="2" style="text-align:center;vertical-align:middle;">Gol. VI</th>
                    <th rowspan="2" style="text-align:center;vertical-align:middle;">Gol. VII</th>
                    <th rowspan="2" style="text-align:center;vertical-align:middle;">Gol. VIII</th>
                    <th rowspan="2" style="text-align:center;vertical-align:middle;">Gol. IX</th>
                    <th rowspan="2" style="text-align:center;vertical-align:middle;background-color: yellow;">Pnp
                    </th>
                    <th rowspan="2" style="text-align:center;vertical-align:middle;background-color: yellow;">Kend.
                        Gol. IV / ></th>
                    <th rowspan="2" style="text-align:center;vertical-align:middle;background-color: yellow;">TON
                    </th>
                    <th rowspan="2" style="text-align:center;vertical-align:middle;background-color: yellow;">KET
                    </th>
                </tr>
                <tr>
                    <th style="text-align:center;vertical-align:middle;">A. Pnp</th>
                    <th style="text-align:center;vertical-align:middle;">B. Brg</th>
                    <th style="text-align:center;vertical-align:middle;">A. Pnp</th>
                    <th style="text-align:center;vertical-align:middle;">B. Brg</th>
                    <th style="text-align:center;vertical-align:middle;">A. Pnp</th>
                    <th style="text-align:center;vertical-align:middle;">B. Brg</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($manifests as $data)
                    @if ($data->type == 1)
                        <tr>
                            <td style="text-align:center;">{{ $loop->iteration }}</td>
                            <td style="text-align:center;">
                                {{ \Carbon\Carbon::parse($data->schedule->arrive_time)->format('l') }}</td>
                            <td style="text-align:center;">
                                {{ \Carbon\Carbon::parse($data->schedule->arrive_time)->format('d F Y') }}</td>
                            <td style="text-align:center;">{{ $data->schedule->ship->name }}</td>
                            <td style="text-align:center;">{{ $data->schedule->ship->passenger_capacity }}</td>
                            <td style="text-align:center;">{{ $data->schedule->ship->vehicle_capacity }}</td>
                            <td style="text-align:center;">1</td>
                            <td style="text-align:center;">{{ $data->adult_passenger }}</td>
                            <td style="text-align:center;">{{ $data->child_passenger }}</td>
                            <td style="text-align:center;background-color: yellow;">
                                {{ $data->adult_passenger + $data->child_passenger }}</td>
                            <td style="text-align:center;background-color: yellow;">{{ $data->vehicle_passenger }}
                            </td>
                            <td style="text-align:center;background-color: yellow;">
                                {{ $data->adult_passenger + $data->child_passenger + $data->vehicle_passenger }}
                            </td>
                            <td style="text-align:center;">{{ $data->group_I }}</td>
                            <td style="text-align:center;">{{ $data->group_II }}</td>
                            <td style="text-align:center;">{{ $data->group_III }}</td>
                            <td style="text-align:center;background-color: yellow;">
                                {{ $data->group_I + $data->group_II + $data->group_III }}</td>
                            <td style="text-align:center;">{{ $data->group_IVA }}</td>
                            <td style="text-align:center;">{{ $data->group_IVB }}</td>
                            <td style="text-align:center;">{{ $data->group_VA }}</td>
                            <td style="text-align:center;">{{ $data->group_VB }}</td>
                            <td style="text-align:center;">{{ $data->group_VIA }}</td>
                            <td style="text-align:center;">{{ $data->group_VIB }}</td>
                            <td style="text-align:center;">{{ $data->group_VII }}</td>
                            <td style="text-align:center;">{{ $data->group_VIII }}</td>
                            <td style="text-align:center;">{{ $data->group_IX }}</td>
                            <td style="text-align:center;background-color: yellow;">
                                {{ $data->group_IVA + $data->group_IVB + $data->group_VA + $data->group_VB + $data->group_VIA + $data->group_VIB + $data->group_VII + $data->group_VIII + $data->group_IX }}
                            </td>
                            <td style="text-align:center;background-color: yellow;">
                                {{ $data->load_factor_passenger }}
                            </td>
                            <td style="text-align:center;background-color: yellow;">
                                {{ $data->load_factor_vehicle }}
                            </td>
                            <td style="text-align:center;background-color: yellow;">{{ $data->bulk_goods }}</td>
                            <td style="text-align:center;background-color: yellow;">
                                {{ $data->description_bulk_goods }}
                            </td>
                        </tr>
                    @endif
                @endforeach


                @php
                    $total_passenger_capacity = 0;
                    $total_vehicle_capacity = 0;
                    $total_adult_passenger = 0;
                    $total_child_passenger = 0;
                    $total_vehicle_passenger = 0;
                    $total_group_I = 0;
                    $total_group_II = 0;
                    $total_group_III = 0;
                    $total_group_IVA = 0;
                    $total_group_IVB = 0;
                    $total_group_VA = 0;
                    $total_group_VB = 0;
                    $total_group_VIA = 0;
                    $total_group_VIB = 0;
                    $total_group_VII = 0;
                    $total_group_VIII = 0;
                    $total_group_IX = 0;
                    $total_group_IV_V_VI_VII_VIII_IX = 0;
                    $total_load_factor_passenger = 0;
                    $total_load_factor_vehicle = 0;
                    $total_bulk_goods = 0;
                @endphp

                @foreach ($manifests as $data)
                    @if ($data->type == 1)
                        @php
                            $total_passenger_capacity += $data->schedule->ship->passenger_capacity;
                            $total_vehicle_capacity += $data->schedule->ship->vehicle_capacity;
                            $total_adult_passenger += $data->adult_passenger;
                            $total_child_passenger += $data->child_passenger;
                            $total_vehicle_passenger += $data->vehicle_passenger;
                            $total_group_I += $data->group_I;
                            $total_group_II += $data->group_II;
                            $total_group_III += $data->group_III;
                            $total_group_IVA += $data->group_IVA;
                            $total_group_IVB += $data->group_IVB;
                            $total_group_VA += $data->group_VA;
                            $total_group_VB += $data->group_VB;
                            $total_group_VIA += $data->group_VIA;
                            $total_group_VIB += $data->group_VIB;
                            $total_group_VII += $data->group_VII;
                            $total_group_VIII += $data->group_VIII;
                            $total_group_IX += $data->group_IX;
                            $total_load_factor_passenger += $data->load_factor_passenger;
                            $total_load_factor_vehicle += $data->load_factor_vehicle;
                            $total_group_IV_V_VI_VII_VIII_IX +=
                                $data->group_IVA +
                                $data->group_IVB +
                                $data->group_VA +
                                $data->group_VB +
                                $data->group_VIA +
                                $data->group_VIB +
                                $data->group_VII +
                                $data->group_VIII +
                                $data->group_IX;
                            $total_bulk_goods += $data->bulk_goods;
                        @endphp
                    @endif
                @endforeach

                <tr>
                    <td colspan="4" style="text-align:center;font-weight: bold;">Jumlah</td>
                    <td style="text-align:center;">{{ $total_passenger_capacity }}</td>
                    <td style="text-align:center;">{{ $total_vehicle_capacity }}</td>
                    <td style="text-align:center;">{{ $manifests->where('type', 1)->count() }}</td>
                    <td style="text-align:center;">{{ $total_adult_passenger }}</td>
                    <td style="text-align:center;">{{ $total_child_passenger }}</td>
                    <td style="text-align:center;background-color: yellow;">
                        {{ $total_adult_passenger + $total_child_passenger }}</td>
                    <td style="text-align:center;background-color: yellow;">{{ $total_vehicle_passenger }}</td>
                    <td style="text-align:center;background-color: yellow;">
                        {{ $total_adult_passenger + $total_child_passenger + $total_vehicle_passenger }}</td>
                    <td style="text-align:center;">{{ $total_group_I }}</td>
                    <td style="text-align:center;">{{ $total_group_II }}</td>
                    <td style="text-align:center;">{{ $total_group_III }}</td>
                    <td style="text-align:center;background-color: yellow;">
                        {{ $total_group_I + $total_group_II + $total_group_III }}</td>
                    <td style="text-align:center;">{{ $total_group_IVA }}</td>
                    <td style="text-align:center;">{{ $total_group_IVB }}</td>
                    <td style="text-align:center;">{{ $total_group_VA }}</td>
                    <td style="text-align:center;">{{ $total_group_VB }}</td>
                    <td style="text-align:center;">{{ $total_group_VIA }}</td>
                    <td style="text-align:center;">{{ $total_group_VIB }}</td>
                    <td style="text-align:center;">{{ $total_group_VII }}</td>
                    <td style="text-align:center;">{{ $total_group_VIII }}</td>
                    <td style="text-align:center;">{{ $total_group_IX }}</td>
                    <td style="text-align:center;background-color: yellow;">
                        {{ $total_group_IV_V_VI_VII_VIII_IX }}</td>
                    <td style="text-align:center;background-color: yellow;">{{ $total_load_factor_passenger }}</td>
                    <td style="text-align:center;background-color: yellow;">{{ $total_load_factor_vehicle }}</td>
                    <td style="text-align:center;background-color: yellow;">{{ $total_bulk_goods }}
                    </td>
                    <td style="text-align:center;background-color: yellow;"></td>
                </tr>

            </tbody>
        </table>
    </div>

    <div style="margin: 5% 0;page-break-before: always;">
        <table class='table-border'>
            <thead>
                <tr>
                    <th colspan="30" style="text-align: center;background-color: red;color: white;">KEBERANGKATAN
                    </th>
                </tr>
                <tr>
                    <th rowspan="3" style="text-align:center;vertical-align:middle;">No.</th>
                    <th rowspan="3" style="text-align:center;vertical-align:middle;">Hari</th>
                    <th rowspan="3" style="text-align:center;vertical-align:middle;">Tanggal</th>
                    <th rowspan="3" style="text-align:center;vertical-align:middle;">Kapal KMP.</th>
                    <th colspan="2" style="text-align:center;vertical-align:middle;">Kapasitas</th>
                    <th rowspan="3" style="text-align:center;vertical-align:middle;">Trip</th>
                    <th colspan="2" style="text-align:center;vertical-align:middle;">Penumpang</th>
                    <th rowspan="3" style="text-align:center;vertical-align:middle;background-color: yellow;">Jml
                        Pnp</th>
                    <th rowspan="3" style="text-align:center;vertical-align:middle;background-color: yellow;">Jm.
                        Pnp dlm Kend</th>
                    <th rowspan="3" style="text-align:center;vertical-align:middle;background-color: yellow;">Jm.
                        Pnp Total</th>
                    <th colspan="3" style="text-align:center;vertical-align:middle;">Kendaraan Gol. I s/d III</th>
                    <th rowspan="3" style="text-align:center;vertical-align:middle;background-color: yellow;">Jml.
                        Kend Gol. I, II, III</th>
                    <th colspan="9" style="text-align:center;vertical-align:middle;">Kendaraan Gol. IV s/d IX</th>
                    <th rowspan="3" style="text-align:center;vertical-align:middle;background-color: yellow;">Jml.
                        Kend. Gol. IV s/d IX</th>
                    <th colspan="2" style="text-align:center;vertical-align:middle;background-color: yellow;">Load
                        Factor (%)</th>
                    <th colspan="2" style="text-align:center;vertical-align:middle;background-color: yellow;">
                        Barang Curah (Ton)</th>
                </tr>
                <tr>
                    <th rowspan="2" style="text-align:center;vertical-align:middle;">Pnp</th>
                    <th rowspan="2" style="text-align:center;vertical-align:middle;">Kend Gol. IV / ></th>
                    <th rowspan="2" style="text-align:center;vertical-align:middle;">Dewasa</th>
                    <th rowspan="2" style="text-align:center;vertical-align:middle;">Anak</th>
                    <th rowspan="2" style="text-align:center;vertical-align:middle;">Gol. I</th>
                    <th rowspan="2" style="text-align:center;vertical-align:middle;">Gol. II</th>
                    <th rowspan="2" style="text-align:center;vertical-align:middle;">Gol. III</th>
                    <th colspan="2" style="text-align:center;vertical-align:middle;">Gol. IV</th>
                    <th colspan="2" style="text-align:center;vertical-align:middle;">Gol. V</th>
                    <th colspan="2" style="text-align:center;vertical-align:middle;">Gol. VI</th>
                    <th rowspan="2" style="text-align:center;vertical-align:middle;">Gol. VII</th>
                    <th rowspan="2" style="text-align:center;vertical-align:middle;">Gol. VIII</th>
                    <th rowspan="2" style="text-align:center;vertical-align:middle;">Gol. IX</th>
                    <th rowspan="2" style="text-align:center;vertical-align:middle;background-color: yellow;">Pnp
                    </th>
                    <th rowspan="2" style="text-align:center;vertical-align:middle;background-color: yellow;">Kend.
                        Gol. IV / ></th>
                    <th rowspan="2" style="text-align:center;vertical-align:middle;background-color: yellow;">TON
                    </th>
                    <th rowspan="2" style="text-align:center;vertical-align:middle;background-color: yellow;">KET
                    </th>
                </tr>
                <tr>
                    <th style="text-align:center;vertical-align:middle;">A. Pnp</th>
                    <th style="text-align:center;vertical-align:middle;">B. Brg</th>
                    <th style="text-align:center;vertical-align:middle;">A. Pnp</th>
                    <th style="text-align:center;vertical-align:middle;">B. Brg</th>
                    <th style="text-align:center;vertical-align:middle;">A. Pnp</th>
                    <th style="text-align:center;vertical-align:middle;">B. Brg</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($manifests as $data)
                    @if ($data->type == 2)
                        <tr>
                            <td style="text-align:center;">{{ $loop->iteration }}</td>
                            <td style="text-align:center;">
                                {{ \Carbon\Carbon::parse($data->schedule->departure_time)->format('l') }}</td>
                            <td style="text-align:center;">
                                {{ \Carbon\Carbon::parse($data->schedule->departure_time)->format('d F Y') }}</td>
                            <td style="text-align:center;">{{ $data->schedule->ship->name }}</td>
                            <td style="text-align:center;">{{ $data->schedule->ship->passenger_capacity }}</td>
                            <td style="text-align:center;">{{ $data->schedule->ship->vehicle_capacity }}</td>
                            <td style="text-align:center;">1</td>
                            <td style="text-align:center;">{{ $data->adult_passenger }}</td>
                            <td style="text-align:center;">{{ $data->child_passenger }}</td>
                            <td style="text-align:center;background-color: yellow;">
                                {{ $data->adult_passenger + $data->child_passenger }}</td>
                            <td style="text-align:center;background-color: yellow;">{{ $data->vehicle_passenger }}
                            </td>
                            <td style="text-align:center;background-color: yellow;">
                                {{ $data->adult_passenger + $data->child_passenger + $data->vehicle_passenger }}
                            </td>
                            <td style="text-align:center;">{{ $data->group_I }}</td>
                            <td style="text-align:center;">{{ $data->group_II }}</td>
                            <td style="text-align:center;">{{ $data->group_III }}</td>
                            <td style="text-align:center;background-color: yellow;">
                                {{ $data->group_I + $data->group_II + $data->group_III }}</td>
                            <td style="text-align:center;">{{ $data->group_IVA }}</td>
                            <td style="text-align:center;">{{ $data->group_IVB }}</td>
                            <td style="text-align:center;">{{ $data->group_VA }}</td>
                            <td style="text-align:center;">{{ $data->group_VB }}</td>
                            <td style="text-align:center;">{{ $data->group_VIA }}</td>
                            <td style="text-align:center;">{{ $data->group_VIB }}</td>
                            <td style="text-align:center;">{{ $data->group_VII }}</td>
                            <td style="text-align:center;">{{ $data->group_VIII }}</td>
                            <td style="text-align:center;">{{ $data->group_IX }}</td>
                            <td style="text-align:center;background-color: yellow;">
                                {{ $data->group_IVA + $data->group_IVB + $data->group_VA + $data->group_VB + $data->group_VIA + $data->group_VIB + $data->group_VII + $data->group_VIII + $data->group_IX }}
                            </td>
                            <td style="text-align:center;background-color: yellow;">
                                {{ $data->load_factor_passenger }}
                            </td>
                            <td style="text-align:center;background-color: yellow;">
                                {{ $data->load_factor_vehicle }}
                            </td>
                            <td style="text-align:center;background-color: yellow;">{{ $data->bulk_goods }}</td>
                            <td style="text-align:center;background-color: yellow;">
                                {{ $data->description_bulk_goods }}
                            </td>
                        </tr>
                    @endif
                @endforeach

                @php
                    $total_passenger_capacity = 0;
                    $total_vehicle_capacity = 0;
                    $total_adult_passenger = 0;
                    $total_child_passenger = 0;
                    $total_vehicle_passenger = 0;
                    $total_group_I = 0;
                    $total_group_II = 0;
                    $total_group_III = 0;
                    $total_group_IVA = 0;
                    $total_group_IVB = 0;
                    $total_group_VA = 0;
                    $total_group_VB = 0;
                    $total_group_VIA = 0;
                    $total_group_VIB = 0;
                    $total_group_VII = 0;
                    $total_group_VIII = 0;
                    $total_group_IX = 0;
                    $total_group_IV_V_VI_VII_VIII_IX = 0;
                    $total_load_factor_passenger = 0;
                    $total_load_factor_vehicle = 0;
                    $total_bulk_goods = 0;
                @endphp

                @foreach ($manifests as $data)
                    @if ($data->type == 2)
                        @php
                            $total_passenger_capacity += $data->schedule->ship->passenger_capacity;
                            $total_vehicle_capacity += $data->schedule->ship->vehicle_capacity;
                            $total_adult_passenger += $data->adult_passenger;
                            $total_child_passenger += $data->child_passenger;
                            $total_vehicle_passenger += $data->vehicle_passenger;
                            $total_group_I += $data->group_I;
                            $total_group_II += $data->group_II;
                            $total_group_III += $data->group_III;
                            $total_group_IVA += $data->group_IVA;
                            $total_group_IVA += $data->group_IVB;
                            $total_group_VA += $data->group_VA;
                            $total_group_VA += $data->group_VB;
                            $total_group_VIA += $data->group_VIA;
                            $total_group_VIB += $data->group_VIB;
                            $total_group_VII += $data->group_VII;
                            $total_group_VIII += $data->group_VIII;
                            $total_group_IX += $data->group_IX;
                            $total_load_factor_passenger += $data->load_factor_passenger;
                            $total_load_factor_vehicle += $data->load_factor_vehicle;
                            $total_group_IV_V_VI_VII_VIII_IX +=
                                $data->group_IVA +
                                $data->group_IVB +
                                $data->group_VA +
                                $data->group_VB +
                                $data->group_VIA +
                                $data->group_VIB +
                                $data->group_VII +
                                $data->group_VIII +
                                $data->group_IX;
                            $total_bulk_goods += $data->bulk_goods;
                        @endphp
                    @endif
                @endforeach

                <tr>
                    <td colspan="4" style="text-align:center;font-weight: bold;">Jumlah</td>
                    <td style="text-align:center;">{{ $total_passenger_capacity }}</td>
                    <td style="text-align:center;">{{ $total_vehicle_capacity }}</td>
                    <td style="text-align:center;">{{ $manifests->where('type', 2)->count() }}</td>
                    <td style="text-align:center;">{{ $total_adult_passenger }}</td>
                    <td style="text-align:center;">{{ $total_child_passenger }}</td>
                    <td style="text-align:center;background-color: yellow;">
                        {{ $total_adult_passenger + $total_child_passenger }}</td>
                    <td style="text-align:center;background-color: yellow;">{{ $total_vehicle_passenger }}</td>
                    <td style="text-align:center;background-color: yellow;">
                        {{ $total_adult_passenger + $total_child_passenger + $total_vehicle_passenger }}</td>
                    <td style="text-align:center;">{{ $total_group_I }}</td>
                    <td style="text-align:center;">{{ $total_group_II }}</td>
                    <td style="text-align:center;">{{ $total_group_III }}</td>
                    <td style="text-align:center;background-color: yellow;">
                        {{ $total_group_I + $total_group_II + $total_group_III }}</td>
                    <td style="text-align:center;">{{ $total_group_IVA }}</td>
                    <td style="text-align:center;">{{ $total_group_IVB }}</td>
                    <td style="text-align:center;">{{ $total_group_VA }}</td>
                    <td style="text-align:center;">{{ $total_group_VB }}</td>
                    <td style="text-align:center;">{{ $total_group_VIA }}</td>
                    <td style="text-align:center;">{{ $total_group_VIB }}</td>
                    <td style="text-align:center;">{{ $total_group_VII }}</td>
                    <td style="text-align:center;">{{ $total_group_VIII }}</td>
                    <td style="text-align:center;">{{ $total_group_IX }}</td>
                    <td style="text-align:center;background-color: yellow;">
                        {{ $total_group_IV_V_VI_VII_VIII_IX }}</td>
                    <td style="text-align:center;background-color: yellow;">{{ $total_load_factor_passenger }}</td>
                    <td style="text-align:center;background-color: yellow;">{{ $total_load_factor_vehicle }}</td>
                    <td style="text-align:center;background-color: yellow;">{{ $total_bulk_goods }}
                    </td>
                    <td style="text-align:center;background-color: yellow;"></td>
                </tr>
            </tbody>
        </table>
    </div>

</body>

</html>