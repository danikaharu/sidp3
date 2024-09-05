2

<html>

<head>
    <title>Laporan Produksi | SIDP3</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        * {
            font-size: 10pt;
        }

        .table-border {
            border: 1px solid black;
            border-collapse: collapse;
            width: 100%;
        }

        .table-border tr td,
        .table-border tr th {
            border: 1px solid black;
            padding: 10px;
            width: auto;
        }
    </style>

    <div style="float: right; text-align: left;">
        <h6 style="margin: 0;">Lampiran 1</h6>
        <h6 style="margin: 0;">Surat Kepala BPTD Kelas II Gorontalo</h6>
        <h6 style="margin: 0;">Nomor : {{ $letter_number }}</h6>
        <h6 style="margin: 0;">Tanggal : {{ $letter_date }}</h6>
    </div>

    <div style="clear: both;"></div>

    <center>
        <h6 style="margin: 0;">Produktivitas Angkutan Penyeberangan</h6>
        <h6 style="margin: 0;">Periode Bulan {{ $month_name }} Tahun {{ $year }}</h6>
        <h6 style="margin: 0;">BPTD Kelas II Gorontalo</h6>
    </center>

    <div style="margin: 2% 0;">
        <h6 style="margin: 0">KEDATANGAN</h6>
        <table class='table-border'>
            <thead>
                <tr>
                    <th rowspan="2" style="text-align:center;vertical-align:middle;">No.</th>
                    <th rowspan="2" style="text-align:center;vertical-align:middle;">Pelabuhan</th>
                    <th rowspan="2" style="text-align:center;vertical-align:middle;">Kapal (KMP)</th>
                    <th rowspan="2" style="text-align:center;vertical-align:middle;">GT</th>
                    <th colspan="2" style="text-align:center;vertical-align:middle;">Kapasitas</th>
                    <th rowspan="2" style="text-align:center;vertical-align:middle;">Trip</th>
                    <th colspan="3" style="text-align:center;vertical-align:middle;">Penumpang (ORANG)</th>
                    <th rowspan="2" style="text-align:center;vertical-align:middle;background-color: yellow;">TOTAL
                        PNP</th>
                    <th colspan="9" style="text-align:center;vertical-align:middle;">KENDARAAN (UNIT)</th>
                    <th rowspan="2" style="text-align:center;vertical-align:middle;background-color: yellow;">TOTAL
                        KEND</th>
                    <th rowspan="2" style="text-align:center;vertical-align:middle;">BARANG LEPAS (TON)</th>
                </tr>
                <tr>
                    <th style="text-align:center;vertical-align:middle;">PNP</th>
                    <th style="text-align:center;vertical-align:middle;">R4</th>
                    <th style="text-align:center;vertical-align:middle;">DEWASA</th>
                    <th style="text-align:center;vertical-align:middle;">ANAK</th>
                    <th style="text-align:center;vertical-align:middle;">PNP DLM KEND</th>
                    <th style="text-align:center;vertical-align:middle;">Gol. I</th>
                    <th style="text-align:center;vertical-align:middle;">Gol. II</th>
                    <th style="text-align:center;vertical-align:middle;">Gol. III</th>
                    <th style="text-align:center;vertical-align:middle;">Gol. IV</th>
                    <th style="text-align:center;vertical-align:middle;">Gol. V</th>
                    <th style="text-align:center;vertical-align:middle;">Gol. VI</th>
                    <th style="text-align:center;vertical-align:middle;">Gol. VII</th>
                    <th style="text-align:center;vertical-align:middle;">Gol. VIII</th>
                    <th style="text-align:center;vertical-align:middle;">Gol. IX</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($manifests as $data)
                    @if ($data->type == 1)
                        <tr>
                            <td style="text-align:center;">{{ $loop->iteration }}</td>
                            <td style="text-align:center;">{{ $data->destination_port_name }}</td>
                            <td style="text-align:center;">{{ $data->ship_name }}</td>
                            <td style="text-align:center;">{{ $data->ship_weight }}</td>
                            <td style="text-align:center;">{{ $data->ship_passenger_capacity }}</td>
                            <td style="text-align:center;">{{ $data->ship_vehicle_capacity }}</td>
                            <td style="text-align:center;">{{ $data->trip }}</td>
                            <td style="text-align:center;">{{ $data->adult_passenger }}</td>
                            <td style="text-align:center;">{{ $data->child_passenger }}</td>
                            <td style="text-align:center;">{{ $data->vehicle_passenger }}</td>
                            <td style="text-align:center;background-color: yellow;">
                                {{ $data->total_passenger }}</td>
                            <td style="text-align:center;">{{ $data->total_group_I }}</td>
                            <td style="text-align:center;">{{ $data->total_group_II }}</td>
                            <td style="text-align:center;">{{ $data->total_group_III }}</td>
                            <td style="text-align:center;">{{ $data->total_group_IV }}</td>
                            <td style="text-align:center;">{{ $data->total_group_V }}</td>
                            <td style="text-align:center;">{{ $data->total_group_VI }}</td>
                            <td style="text-align:center;">{{ $data->total_group_VII }}</td>
                            <td style="text-align:center;">{{ $data->total_group_VIII }}</td>
                            <td style="text-align:center;">{{ $data->total_group_IX }}</td>
                            <td style="text-align:center;background-color: yellow;">
                                {{ $data->total_all_groups }}
                            </td>
                            <td style="text-align:center;">{{ $data->total_bulk_goods }}</td>
                        </tr>
                    @endif
                @endforeach

                @php
                    $total_trip = 0;
                    $total_adult_passenger = 0;
                    $total_child_passenger = 0;
                    $total_vehicle_passenger = 0;
                    $total_passenger = 0;
                    $total_group_I = 0;
                    $total_group_II = 0;
                    $total_group_III = 0;
                    $total_group_IV = 0;
                    $total_group_V = 0;
                    $total_group_VI = 0;
                    $total_group_VII = 0;
                    $total_group_VIII = 0;
                    $total_group_IX = 0;
                    $total_group = 0;
                    $total_bulk_goods = 0;
                @endphp

                @foreach ($manifests as $data)
                    @if ($data->type == 1)
                        @php
                            $total_trip += $data->trip;
                            $total_adult_passenger += $data->adult_passenger;
                            $total_child_passenger += $data->child_passenger;
                            $total_vehicle_passenger += $data->vehicle_passenger;
                            $total_passenger +=
                                $data->adult_passenger + $data->child_passenger + $data->vehicle_passenger;
                            $total_group_I += $data->total_group_I;
                            $total_group_II += $data->total_group_II;
                            $total_group_III += $data->total_group_III;
                            $total_group_IV += $data->total_group_IV;
                            $total_group_V += $data->total_group_V;
                            $total_group_VI += $data->total_group_VI;
                            $total_group_VII += $data->total_group_VII;
                            $total_group_VIII += $data->total_group_VIII;
                            $total_group_IX += $data->total_group_IX;
                            $total_group += $data->total_all_groups;
                            $total_bulk_goods += $data->total_bulk_goods;
                        @endphp
                    @endif
                @endforeach
                <tr>
                    <td colspan="6" style="text-align:center;font-weight: bold;">Jumlah</td>
                    <td style="text-align:center; background-color: yellow;">{{ $total_trip }}</td>
                    <td style="text-align:center; background-color: yellow;">{{ $total_adult_passenger }}</td>
                    <td style="text-align:center; background-color: yellow;">{{ $total_child_passenger }}</td>
                    <td style="text-align:center; background-color: yellow;">{{ $total_vehicle_passenger }}</td>
                    <td style="text-align:center; background-color: yellow;">{{ $total_passenger }}</td>
                    <td style="text-align:center; background-color: yellow;">{{ $total_group_I }}</td>
                    <td style="text-align:center; background-color: yellow;">{{ $total_group_II }}</td>
                    <td style="text-align:center; background-color: yellow;">{{ $total_group_III }}</td>
                    <td style="text-align:center; background-color: yellow;">{{ $total_group_IV }}</td>
                    <td style="text-align:center; background-color: yellow;">{{ $total_group_V }}</td>
                    <td style="text-align:center; background-color: yellow;">{{ $total_group_VI }}</td>
                    <td style="text-align:center; background-color: yellow;">{{ $total_group_VII }}</td>
                    <td style="text-align:center; background-color: yellow;">{{ $total_group_VIII }}</td>
                    <td style="text-align:center; background-color: yellow;">{{ $total_group_IX }}</td>
                    <td style="text-align:center; background-color: yellow;">{{ $total_group }}</td>
                    <td style="text-align:center; background-color: yellow;">{{ $total_bulk_goods }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div style="margin: 2% 0;">
        <h6 style="margin: 0">KEBERANGKATAN</h6>
        <table class='table-border'>
            <thead>
                <tr>
                    <th rowspan="2" style="text-align:center;vertical-align:middle;">No.</th>
                    <th rowspan="2" style="text-align:center;vertical-align:middle;">Pelabuhan</th>
                    <th rowspan="2" style="text-align:center;vertical-align:middle;">Kapal (KMP)</th>
                    <th rowspan="2" style="text-align:center;vertical-align:middle;">GT</th>
                    <th colspan="2" style="text-align:center;vertical-align:middle;">Kapasitas</th>
                    <th rowspan="2" style="text-align:center;vertical-align:middle;">Trip</th>
                    <th colspan="3" style="text-align:center;vertical-align:middle;">Penumpang (ORANG)</th>
                    <th rowspan="2" style="text-align:center;vertical-align:middle;background-color: yellow;">TOTAL
                        PNP</th>
                    <th colspan="9" style="text-align:center;vertical-align:middle;">KENDARAAN (UNIT)</th>
                    <th rowspan="2" style="text-align:center;vertical-align:middle;background-color: yellow;">TOTAL
                        KEND</th>
                    <th rowspan="2" style="text-align:center;vertical-align:middle;">BARANG LEPAS (TON)</th>
                </tr>
                <tr>
                    <th style="text-align:center;vertical-align:middle;">PNP</th>
                    <th style="text-align:center;vertical-align:middle;">R4</th>
                    <th style="text-align:center;vertical-align:middle;">DEWASA</th>
                    <th style="text-align:center;vertical-align:middle;">ANAK</th>
                    <th style="text-align:center;vertical-align:middle;">PNP DLM KEND</th>
                    <th style="text-align:center;vertical-align:middle;">Gol. I</th>
                    <th style="text-align:center;vertical-align:middle;">Gol. II</th>
                    <th style="text-align:center;vertical-align:middle;">Gol. III</th>
                    <th style="text-align:center;vertical-align:middle;">Gol. IV</th>
                    <th style="text-align:center;vertical-align:middle;">Gol. V</th>
                    <th style="text-align:center;vertical-align:middle;">Gol. VI</th>
                    <th style="text-align:center;vertical-align:middle;">Gol. VII</th>
                    <th style="text-align:center;vertical-align:middle;">Gol. VIII</th>
                    <th style="text-align:center;vertical-align:middle;">Gol. IX</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($manifests as $data)
                    @if ($data->type == 2)
                        <tr>
                            <td style="text-align:center;">{{ $loop->iteration }}</td>
                            <td style="text-align:center;">{{ $data->origin_port_name }}</td>
                            <td style="text-align:center;">{{ $data->ship_name }}</td>
                            <td style="text-align:center;">{{ $data->ship_weight }}</td>
                            <td style="text-align:center;">{{ $data->ship_passenger_capacity }}</td>
                            <td style="text-align:center;">{{ $data->ship_vehicle_capacity }}</td>
                            <td style="text-align:center;">{{ $data->trip }}</td>
                            <td style="text-align:center;">{{ $data->adult_passenger }}</td>
                            <td style="text-align:center;">{{ $data->child_passenger }}</td>
                            <td style="text-align:center;">{{ $data->vehicle_passenger }}</td>
                            <td style="text-align:center;background-color: yellow;">
                                {{ $data->total_passenger }}</td>
                            <td style="text-align:center;">{{ $data->total_group_I }}</td>
                            <td style="text-align:center;">{{ $data->total_group_II }}</td>
                            <td style="text-align:center;">{{ $data->total_group_III }}</td>
                            <td style="text-align:center;">{{ $data->total_group_IV }}</td>
                            <td style="text-align:center;">{{ $data->total_group_V }}</td>
                            <td style="text-align:center;">{{ $data->total_group_VI }}</td>
                            <td style="text-align:center;">{{ $data->total_group_VII }}</td>
                            <td style="text-align:center;">{{ $data->total_group_VIII }}</td>
                            <td style="text-align:center;">{{ $data->total_group_IX }}</td>
                            <td style="text-align:center;background-color: yellow;">
                                {{ $data->total_all_groups }}
                            </td>
                            <td style="text-align:center;">{{ $data->total_bulk_goods }}</td>
                        </tr>
                    @endif
                @endforeach

                @php
                    $total_trip = 0;
                    $total_adult_passenger = 0;
                    $total_child_passenger = 0;
                    $total_vehicle_passenger = 0;
                    $total_passenger = 0;
                    $total_group_I = 0;
                    $total_group_II = 0;
                    $total_group_III = 0;
                    $total_group_IV = 0;
                    $total_group_V = 0;
                    $total_group_VI = 0;
                    $total_group_VII = 0;
                    $total_group_VIII = 0;
                    $total_group_IX = 0;
                    $total_group = 0;
                    $total_bulk_goods = 0;
                @endphp

                @foreach ($manifests as $data)
                    @if ($data->type == 2)
                        @php
                            $total_trip += $data->trip;
                            $total_adult_passenger += $data->adult_passenger;
                            $total_child_passenger += $data->child_passenger;
                            $total_vehicle_passenger += $data->vehicle_passenger;
                            $total_passenger +=
                                $data->adult_passenger + $data->child_passenger + $data->vehicle_passenger;
                            $total_group_I += $data->total_group_I;
                            $total_group_II += $data->total_group_II;
                            $total_group_III += $data->total_group_III;
                            $total_group_IV += $data->total_group_IV;
                            $total_group_V += $data->total_group_V;
                            $total_group_VI += $data->total_group_VI;
                            $total_group_VII += $data->total_group_VII;
                            $total_group_VIII += $data->total_group_VIII;
                            $total_group_IX += $data->total_group_IX;
                            $total_group += $data->total_all_groups;
                            $total_bulk_goods += $data->total_bulk_goods;
                        @endphp
                    @endif
                @endforeach
                <tr>
                    <td colspan="6" style="text-align:center;font-weight: bold;">Jumlah</td>
                    <td style="text-align:center; background-color: yellow;">{{ $total_trip }}</td>
                    <td style="text-align:center; background-color: yellow;">{{ $total_adult_passenger }}</td>
                    <td style="text-align:center; background-color: yellow;">{{ $total_child_passenger }}</td>
                    <td style="text-align:center; background-color: yellow;">{{ $total_vehicle_passenger }}</td>
                    <td style="text-align:center; background-color: yellow;">{{ $total_passenger }}</td>
                    <td style="text-align:center; background-color: yellow;">{{ $total_group_I }}</td>
                    <td style="text-align:center; background-color: yellow;">{{ $total_group_II }}</td>
                    <td style="text-align:center; background-color: yellow;">{{ $total_group_III }}</td>
                    <td style="text-align:center; background-color: yellow;">{{ $total_group_IV }}</td>
                    <td style="text-align:center; background-color: yellow;">{{ $total_group_V }}</td>
                    <td style="text-align:center; background-color: yellow;">{{ $total_group_VI }}</td>
                    <td style="text-align:center; background-color: yellow;">{{ $total_group_VII }}</td>
                    <td style="text-align:center; background-color: yellow;">{{ $total_group_VIII }}</td>
                    <td style="text-align:center; background-color: yellow;">{{ $total_group_IX }}</td>
                    <td style="text-align:center; background-color: yellow;">{{ $total_group }}</td>
                    <td style="text-align:center; background-color: yellow;">{{ $total_bulk_goods }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div style="float: right; text-align: center;">
        <h6>Kepala Seksi Sarana AJSDP,</h6>
        <h6>&nbsp;</h6>
        <h6>&nbsp;</h6>
        <h6 style="margin: 0">Hotden H. Naibaho, S.T., M.M.</h6>
        <h6 style="margin: 0">NIP. 1932173912737127</h6>
    </div>

</body>

</html>
