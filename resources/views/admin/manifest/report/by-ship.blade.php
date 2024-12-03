<html>

<head>
    <title>Laporan Produksi | SIDP3</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style>
        .table-wrapper {
            overflow-x: auto;
            margin: 20px 0;
            font-size: 10px;
        }

        .table-border {
            border: 1px solid black;
            border-collapse: collapse;
            width: 100%;
            font-family: Arial, sans-serif;
        }

        .table-border th {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
            /* Warna header */
            color: black;
            font-weight: bold;
        }

        .table-border td {
            border: 1px solid black;
            padding: 6px;
            text-align: center;
            /* Sesuaikan jika perlu */
        }

        .table-border tbody tr:nth-child(even) {
            background-color: #f2f2f2;
            /* Warna baris genap */
        }

        .table-border tbody tr:hover {
            background-color: #ddd;
            /* Warna saat baris di-hover */
        }

        .highlight {
            background-color: yellow;
            /* Penyorotan kolom penting */
            font-weight: bold;
        }
    </style>

    <center>
        <h5 style="margin: 0;">LAPORAN DATA PRODUKSI</h5>
        <h5 style="margin: 0;">SATUAN PELAYANAN PELABUHAN PENYEBERANGAN GORONTALO</h5>
        <h5 style="margin: 0;">BULAN {{ $month_name }} {{ $year }}</h5>
    </center>

    <div class="table-wrapper">
        <table class='table-border'>
            <thead>
                <tr>
                    <th colspan="32" style="text-align: center;background-color: blue;color: white;">KEDATANGAN</th>
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
                    <th colspan="2" style="text-align:center;vertical-align:middle;background-color: yellow;">Barang
                        Muatan (Ton)</th>
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
                @foreach ($datesInMonth as $date => $data)
                    @if ($data['arrival'])
                        <tr>
                            <td style="text-align:center;">{{ $loop->iteration }}</td>
                            <td style="text-align:center;">
                                {{ \Carbon\Carbon::parse($date)->isoFormat('dddd') }}
                            </td>
                            <td style="text-align:center;">
                                {{ \Carbon\Carbon::parse($date)->translatedFormat('d F Y') }}
                            </td>
                            <td style="text-align:center;">{{ $data['arrival']->schedule->ship->name }}</td>
                            <td style="text-align:center;">{{ $data['arrival']->schedule->ship->passenger_capacity }}
                            </td>
                            <td style="text-align:center;">{{ $data['arrival']->schedule->ship->vehicle_capacity }}</td>
                            <td style="text-align:center;">1</td>
                            <td style="text-align:center;">{{ $data['arrival']->adult_passenger }}</td>
                            <td style="text-align:center;">{{ $data['arrival']->child_passenger }}</td>
                            <td style="text-align:center;background-color: yellow;">
                                {{ $data['arrival']->adult_passenger + $data['arrival']->child_passenger }}</td>
                            <td style="text-align:center;background-color: yellow;">
                                {{ $data['arrival']->vehicle_passenger }}
                            </td>
                            <td style="text-align:center;background-color: yellow;">
                                {{ $data['arrival']->adult_passenger + $data['arrival']->child_passenger + $data['arrival']->vehicle_passenger }}
                            </td>
                            <td style="text-align:center;">{{ $data['arrival']->group_I }}</td>
                            <td style="text-align:center;">{{ $data['arrival']->group_II }}</td>
                            <td style="text-align:center;">{{ $data['arrival']->group_III }}</td>
                            <td style="text-align:center;background-color: yellow;">
                                {{ $data['arrival']->group_I + $data['arrival']->group_II + $data['arrival']->group_III }}
                            </td>
                            <td style="text-align:center;">{{ $data['arrival']->group_IVA }}</td>
                            <td style="text-align:center;">{{ $data['arrival']->group_IVB }}</td>
                            <td style="text-align:center;">{{ $data['arrival']->group_VA }}</td>
                            <td style="text-align:center;">{{ $data['arrival']->group_VB }}</td>
                            <td style="text-align:center;">{{ $data['arrival']->group_VIA }}</td>
                            <td style="text-align:center;">{{ $data['arrival']->group_VIB }}</td>
                            <td style="text-align:center;">{{ $data['arrival']->group_VII }}</td>
                            <td style="text-align:center;">{{ $data['arrival']->group_VIII }}</td>
                            <td style="text-align:center;">{{ $data['arrival']->group_IX }}</td>
                            <td style="text-align:center;background-color: yellow;">
                                {{ $data['arrival']->group_IVA + $data['arrival']->group_IVB + $data['arrival']->group_VA + $data['arrival']->group_VB + $data['arrival']->group_VIA + $data['arrival']->group_VIB + $data['arrival']->group_VII + $data['arrival']->group_VIII + $data['arrival']->group_IX }}
                            </td>
                            <td style="text-align:center;background-color: yellow;">
                                {{ $data['arrival']->load_factor_passenger }}
                            </td>
                            <td style="text-align:center;background-color: yellow;">
                                {{ $data['arrival']->load_factor_vehicle }}
                            </td>
                            <td style="text-align:center;background-color: yellow;">{{ $data['arrival']->bulk_goods }}
                            </td>
                            <td style="text-align:center;background-color: yellow;">
                                {{ $data['arrival']->description_bulk_goods }}
                            </td>
                            <td style="text-align:center;background-color: yellow;">
                                {{ $data['arrival']->vehicle_load }}
                            </td>
                            <td style="text-align:center;background-color: yellow;">
                                {{ $data['arrival']->description_vehicle_load }}
                            </td>
                        </tr>
                    @else
                        <tr>
                            <td style="text-align:center;">{{ $loop->iteration }}</td>
                            <td style="text-align:center;">
                                {{ \Carbon\Carbon::parse($date)->isoFormat('dddd') }}
                            </td>
                            <td style="text-align:center;">
                                {{ \Carbon\Carbon::parse($date)->translatedFormat('d F Y') }}
                            </td>
                            <td style="text-align:center;"></td>
                            <td style="text-align:center;">-</td>
                            <td style="text-align:center;">-</td>
                            <td style="text-align:center;">-</td>
                            <td style="text-align:center;">-</td>
                            <td style="text-align:center;">-</td>
                            <td style="text-align:center;background-color: yellow;">
                                -</td>
                            <td style="text-align:center;background-color: yellow;">
                                -
                            </td>
                            <td style="text-align:center;background-color: yellow;">
                                -
                            </td>
                            <td style="text-align:center;">-</td>
                            <td style="text-align:center;">-</td>
                            <td style="text-align:center;"></td>
                            <td style="text-align:center;background-color: yellow;">
                                -
                            </td>
                            <td style="text-align:center;">-</td>
                            <td style="text-align:center;">-</td>
                            <td style="text-align:center;">-</td>
                            <td style="text-align:center;">-</td>
                            <td style="text-align:center;">-</td>
                            <td style="text-align:center;">-</td>
                            <td style="text-align:center;">-</td>
                            <td style="text-align:center;">-</td>
                            <td style="text-align:center;">-</td>
                            <td style="text-align:center;background-color: yellow;">
                                -
                            </td>
                            <td style="text-align:center;background-color: yellow;">
                                -
                            </td>
                            <td style="text-align:center;background-color: yellow;">
                                -
                            </td>
                            <td style="text-align:center;background-color: yellow;">-
                            </td>
                            <td style="text-align:center;background-color: yellow;">
                                -
                            </td>
                            <td style="text-align:center;background-color: yellow;">
                                -
                            </td>
                            <td style="text-align:center;background-color: yellow;">
                                -
                            </td>
                        </tr>
                    @endif
                @endforeach


                @php
                    $total_trip = 0;
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
                    $total_vehicle_load = 0;
                @endphp

                @foreach ($datesInMonth as $date => $data)
                    @if ($data['arrival'])
                        @php
                            $total_trip++;
                            $total_passenger_capacity += $data['arrival']->schedule->ship->passenger_capacity;
                            $total_vehicle_capacity += $data['arrival']->schedule->ship->vehicle_capacity;
                            $total_adult_passenger += $data['arrival']->adult_passenger;
                            $total_child_passenger += $data['arrival']->child_passenger;
                            $total_vehicle_passenger += $data['arrival']->vehicle_passenger;
                            $total_group_I += $data['arrival']->group_I;
                            $total_group_II += $data['arrival']->group_II;
                            $total_group_III += $data['arrival']->group_III;
                            $total_group_IVA += $data['arrival']->group_IVA;
                            $total_group_IVB += $data['arrival']->group_IVB;
                            $total_group_VA += $data['arrival']->group_VA;
                            $total_group_VB += $data['arrival']->group_VB;
                            $total_group_VIA += $data['arrival']->group_VIA;
                            $total_group_VIB += $data['arrival']->group_VIB;
                            $total_group_VII += $data['arrival']->group_VII;
                            $total_group_VIII += $data['arrival']->group_VIII;
                            $total_group_IX += $data['arrival']->group_IX;
                            $total_load_factor_passenger += $data['arrival']->load_factor_passenger;
                            $total_load_factor_vehicle += $data['arrival']->load_factor_vehicle;
                            $total_group_IV_V_VI_VII_VIII_IX +=
                                $data['arrival']->group_IVA +
                                $data['arrival']->group_IVB +
                                $data['arrival']->group_VA +
                                $data['arrival']->group_VB +
                                $data['arrival']->group_VIA +
                                $data['arrival']->group_VIB +
                                $data['arrival']->group_VII +
                                $data['arrival']->group_VIII +
                                $data['arrival']->group_IX;
                            $total_bulk_goods += $data['arrival']->bulk_goods;
                            $total_vehicle_load += $data['arrival']->vehicle_load;
                        @endphp
                    @endif
                @endforeach

                <tr>
                    <td colspan="4" style="text-align:center;font-weight: bold;">Jumlah</td>
                    <td style="text-align:center;">{{ $total_passenger_capacity }}</td>
                    <td style="text-align:center;">{{ $total_vehicle_capacity }}</td>
                    <td style="text-align:center;">{{ $total_trip }}</td>
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
                    <td style="text-align:center;background-color: yellow;">{{ $total_vehicle_load }}
                    </td>
                    <td style="text-align:center;background-color: yellow;"></td>
                </tr>

            </tbody>
        </table>
    </div>

    <div class="table-wrapper" style="page-break-before: always;">
        <table class='table-border'>
            <thead>
                <tr>
                    <th colspan="32" style="text-align: center;background-color: red;color: white;">KEBERANGKATAN
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
                    <th colspan="2" style="text-align:center;vertical-align:middle;background-color: yellow;">
                        Barang Muatan Kendaraan (Ton)</th>
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
                @foreach ($datesInMonth as $date => $data)
                    @if ($data['departure'])
                        <tr>
                            <td style="text-align:center;">{{ $loop->iteration }}</td>
                            <td style="text-align:center;">
                                {{ \Carbon\Carbon::parse($date)->isoFormat('dddd') }}
                            </td>
                            <td style="text-align:center;">
                                {{ \Carbon\Carbon::parse($date)->translatedFormat('d F Y') }}
                            </td>
                            <td style="text-align:center;">{{ $data['departure']->schedule->ship->name }}</td>
                            <td style="text-align:center;">
                                {{ $data['departure']->schedule->ship->passenger_capacity }}</td>
                            <td style="text-align:center;">{{ $data['departure']->schedule->ship->vehicle_capacity }}
                            </td>
                            <td style="text-align:center;">1</td>
                            <td style="text-align:center;">{{ $data['departure']->adult_passenger }}</td>
                            <td style="text-align:center;">{{ $data['departure']->child_passenger }}</td>
                            <td style="text-align:center;background-color: yellow;">
                                {{ $data['departure']->adult_passenger + $data['departure']->child_passenger }}</td>
                            <td style="text-align:center;background-color: yellow;">
                                {{ $data['departure']->vehicle_passenger }}
                            </td>
                            <td style="text-align:center;background-color: yellow;">
                                {{ $data['departure']->adult_passenger + $data['departure']->child_passenger + $data['departure']->vehicle_passenger }}
                            </td>
                            <td style="text-align:center;">{{ $data['departure']->group_I }}</td>
                            <td style="text-align:center;">{{ $data['departure']->group_II }}</td>
                            <td style="text-align:center;">{{ $data['departure']->group_III }}</td>
                            <td style="text-align:center;background-color: yellow;">
                                {{ $data['departure']->group_I + $data['departure']->group_II + $data['departure']->group_III }}
                            </td>
                            <td style="text-align:center;">{{ $data['departure']->group_IVA }}</td>
                            <td style="text-align:center;">{{ $data['departure']->group_IVB }}</td>
                            <td style="text-align:center;">{{ $data['departure']->group_VA }}</td>
                            <td style="text-align:center;">{{ $data['departure']->group_VB }}</td>
                            <td style="text-align:center;">{{ $data['departure']->group_VIA }}</td>
                            <td style="text-align:center;">{{ $data['departure']->group_VIB }}</td>
                            <td style="text-align:center;">{{ $data['departure']->group_VII }}</td>
                            <td style="text-align:center;">{{ $data['departure']->group_VIII }}</td>
                            <td style="text-align:center;">{{ $data['departure']->group_IX }}</td>
                            <td style="text-align:center;background-color: yellow;">
                                {{ $data['departure']->group_IVA + $data['departure']->group_IVB + $data['departure']->group_VA + $data['departure']->group_VB + $data['departure']->group_VIA + $data['departure']->group_VIB + $data['departure']->group_VII + $data['departure']->group_VIII + $data['departure']->group_IX }}
                            </td>
                            <td style="text-align:center;background-color: yellow;">
                                {{ $data['departure']->load_factor_passenger }}
                            </td>
                            <td style="text-align:center;background-color: yellow;">
                                {{ $data['departure']->load_factor_vehicle }}
                            </td>
                            <td style="text-align:center;background-color: yellow;">
                                {{ $data['departure']->bulk_goods }}</td>
                            <td style="text-align:center;background-color: yellow;">
                                {{ $data['departure']->description_bulk_goods }}
                            </td>
                            <td style="text-align:center;background-color: yellow;">
                                {{ $data['departure']->vehicle_load }}</td>
                            <td style="text-align:center;background-color: yellow;">
                                {{ $data['departure']->description_vehicle_load }}
                            </td>
                        </tr>
                    @else
                        <tr>
                            <td style="text-align:center;">{{ $loop->iteration }}</td>
                            <td style="text-align:center;">
                                {{ \Carbon\Carbon::parse($date)->isoFormat('dddd') }}
                            </td>
                            <td style="text-align:center;">
                                {{ \Carbon\Carbon::parse($date)->translatedFormat('d F Y') }}
                            </td>
                            <td style="text-align:center;"></td>
                            <td style="text-align:center;">-</td>
                            <td style="text-align:center;">-</td>
                            <td style="text-align:center;">-</td>
                            <td style="text-align:center;">-</td>
                            <td style="text-align:center;">-</td>
                            <td style="text-align:center;background-color: yellow;">
                                -</td>
                            <td style="text-align:center;background-color: yellow;">
                                -
                            </td>
                            <td style="text-align:center;background-color: yellow;">
                                -
                            </td>
                            <td style="text-align:center;">-</td>
                            <td style="text-align:center;">-</td>
                            <td style="text-align:center;"></td>
                            <td style="text-align:center;background-color: yellow;">
                                -
                            </td>
                            <td style="text-align:center;">-</td>
                            <td style="text-align:center;">-</td>
                            <td style="text-align:center;">-</td>
                            <td style="text-align:center;">-</td>
                            <td style="text-align:center;">-</td>
                            <td style="text-align:center;">-</td>
                            <td style="text-align:center;">-</td>
                            <td style="text-align:center;">-</td>
                            <td style="text-align:center;">-</td>
                            <td style="text-align:center;background-color: yellow;">
                                -
                            </td>
                            <td style="text-align:center;background-color: yellow;">
                                -
                            </td>
                            <td style="text-align:center;background-color: yellow;">
                                -
                            </td>
                            <td style="text-align:center;background-color: yellow;">-
                            </td>
                            <td style="text-align:center;background-color: yellow;">
                                -
                            </td>
                            <td style="text-align:center;background-color: yellow;">
                                -
                            </td>
                            <td style="text-align:center;background-color: yellow;">
                                -
                            </td>
                        </tr>
                    @endif
                @endforeach

                @php
                    $total_trip = 0;
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
                    $total_vehicle_load = 0;
                @endphp

                @foreach ($datesInMonth as $date => $data)
                    @if ($data['departure'])
                        @php
                            $total_trip++;
                            $total_passenger_capacity += $data['departure']->schedule->ship->passenger_capacity;
                            $total_vehicle_capacity += $data['departure']->schedule->ship->vehicle_capacity;
                            $total_adult_passenger += $data['departure']->adult_passenger;
                            $total_child_passenger += $data['departure']->child_passenger;
                            $total_vehicle_passenger += $data['departure']->vehicle_passenger;
                            $total_group_I += $data['departure']->group_I;
                            $total_group_II += $data['departure']->group_II;
                            $total_group_III += $data['departure']->group_III;
                            $total_group_IVA += $data['departure']->group_IVA;
                            $total_group_IVA += $data['departure']->group_IVB;
                            $total_group_VA += $data['departure']->group_VA;
                            $total_group_VA += $data['departure']->group_VB;
                            $total_group_VIA += $data['departure']->group_VIA;
                            $total_group_VIB += $data['departure']->group_VIB;
                            $total_group_VII += $data['departure']->group_VII;
                            $total_group_VIII += $data['departure']->group_VIII;
                            $total_group_IX += $data['departure']->group_IX;
                            $total_load_factor_passenger += $data['departure']->load_factor_passenger;
                            $total_load_factor_vehicle += $data['departure']->load_factor_vehicle;
                            $total_group_IV_V_VI_VII_VIII_IX +=
                                $data['departure']->group_IVA +
                                $data['departure']->group_IVB +
                                $data['departure']->group_VA +
                                $data['departure']->group_VB +
                                $data['departure']->group_VIA +
                                $data['departure']->group_VIB +
                                $data['departure']->group_VII +
                                $data['departure']->group_VIII +
                                $data['departure']->group_IX;
                            $total_bulk_goods += $data['departure']->bulk_goods;
                            $total_vehicle_load += $data['departure']->vehicle_load;
                        @endphp
                    @endif
                @endforeach

                <tr>
                    <td colspan="4" style="text-align:center;font-weight: bold;">Jumlah</td>
                    <td style="text-align:center;">{{ $total_passenger_capacity }}</td>
                    <td style="text-align:center;">{{ $total_vehicle_capacity }}</td>
                    <td style="text-align:center;">{{ $total_trip }}</td>
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
                    <td style="text-align:center;background-color: yellow;">{{ $total_vehicle_load }}
                    </td>
                    <td style="text-align:center;background-color: yellow;"></td>
                </tr>
            </tbody>
        </table>
    </div>

</body>

</html>
