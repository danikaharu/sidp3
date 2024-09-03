<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Laporan SPB | SIDP3</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        body {
            margin: 3%;
        }

        .table-border {
            border: 1px solid black;
            border-collapse: collapse;
            width: 100%;
        }

        .table-border tr td,
        .table-border tr th {
            font-size: 9pt;
            text-transform: uppercase;
            border: 1px solid black;
        }
    </style>

    <div style="float: right; text-align:left;">
        <h6 style="margin: 0;">Lampiran III Laporan Penggunaan Blanko Selang Bulan {{ $month }}
            {{ $year }}</h6>
        <h6 style="margin: 0;">Nomor : {{ $letter_number ?? '' }}</h6>
        <h6 style="margin: 0;">Tanggal : {{ $letter_date ?? '' }}</h6>
        <hr style="border: 1px solid black;">
    </div>

    <div style="clear: both;"></div>

    <center>
        <h6 style="margin: 0;">REGISTRASI SURAT PERSETUJUAN BERLAYAR</h6>
        <h6 style="margin: 0;">PELABUHAN PENYEBERANGAN GORONTALO</h6>
        <h6 style="margin: 0;">SELANG BULAN {{ strtoUpper($month) }} {{ $year }}</h6>
    </center>

    <div style="margin: 5% 0;">
        <table class='table-border'>
            <thead>
                <tr>
                    <th rowspan="3" style="text-align:center;vertical-align:middle;">No.</th>
                    <th rowspan="3" style="text-align:center;vertical-align:middle;">No. Cetak SPB</th>
                    <th colspan="4" style="text-align:center;vertical-align:middle;">DATA KAPAL</th>
                    <th colspan="7" style="text-align:center;vertical-align:middle;">SURAT PERSETUJUAN BERLAYAR</th>
                    <th rowspan="3" style="text-align:center;vertical-align:middle;">KET</th>
                </tr>
                <tr>
                    <th rowspan="2" style="text-align:center;vertical-align:middle;">Nama Kapal</th>
                    <th rowspan="2" style="text-align:center;vertical-align:middle;">Nama Panggilan (Call Sign)</th>
                    <th rowspan="2" style="text-align:center;vertical-align:middle;">Gross Tonnage (GT)</th>
                    <th rowspan="2" style="text-align:center;vertical-align:middle;">Bendera</th>
                    <th colspan="3" style="text-align:center;vertical-align:middle;background-color: yellow;">TIBA
                    </th>
                    <th colspan="4" style="text-align:center;vertical-align:middle;background-color: aqua;">TOLAK
                    </th>
                </tr>
                <tr>
                    <th style="text-align:center;vertical-align:middle;">Tanggal Tiba</th>
                    <th style="text-align:center;vertical-align:middle;">Pelabuhan Asal</th>
                    <th style="text-align:center;vertical-align:middle;">No. SPB</th>
                    <th style="text-align:center;vertical-align:middle;">Tanggal Tolak</th>
                    <th style="text-align:center;vertical-align:middle;">Pelabuhan Tujuan</th>
                    <th style="text-align:center;vertical-align:middle;">No. SPB</th>
                    <th style="text-align:center;vertical-align:middle;">ETA</th>
                </tr>
            </thead>
            <tbody>
                @forelse($sailingWarrants as $data)
                    <tr>
                        <td style="text-align:center;">{{ $loop->iteration }}</td>
                        <td style="text-align:center;">{{ $data->print_number }}</td>
                        <td style="text-align:center;">{{ $data->schedule->ship->name }}</td>
                        <td style="text-align:center;">{{ $data->schedule->ship->call_sign }}</td>
                        <td style="text-align:center;">{{ $data->schedule->ship->weight }}</td>
                        <td style="text-align:center;">{{ $data->schedule->ship->flag }}</td>
                        <td style="text-align:center;">
                            {{ \Carbon\Carbon::parse($data->schedule->arrive_time)->format('d F') }}
                        </td>
                        <td style="text-align:center;">{{ $data->schedule->originPort->name }}</td>
                        <td style="text-align:center;">{{ $data->arrive_number }}</td>
                        <td style="text-align:center;">
                            {{ \Carbon\Carbon::parse($data->schedule->departure_time)->format('d F') }}
                        </td>
                        <td style="text-align:center;">{{ $data->schedule->destinationPort->name }}</td>
                        <td style="text-align:center;">{{ $data->departure_number }}</td>
                        <td style="text-align:center;">
                            {{ \Carbon\Carbon::parse($data->schedule->departure_time)->format('H.i') }}</td>
                        <td style="text-align:center;">{{ $data->situation }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="14" style="text-align: center">Maaf, belum ada data</td>
                    </tr>
                @endforelse ($sailingWarrants as $data)
            </tbody>
        </table>
    </div>

    <table style="width: 100%; line-height: 1.2;border:none; ">
        <tr>
            <td style="vertical-align: top; padding-right: 20px;">
                <table>
                    <tr>
                        <td>1. Kapal &lt; GT500</td>
                        <td>: {{ $shipsUnder500Count }} Kapal</td>
                    </tr>
                    <tr>
                        <td>2. Kapal &gt; GT500</td>
                        <td>: {{ $shipsOver500Count }} Kapal</td>
                    </tr>
                    <tr>
                        <td>3. Bendera Indonesia</td>
                        <td>: {{ $indonesianShipsCount }} Kapal</td>
                    </tr>
                    <tr>
                        <td>4. Total Kapal Yang Keluar</td>
                        <td>: {{ $sailingWarrants->count() }} Kapal</td>
                    </tr>
                </table>
            </td>
            <td style="text-align: center;">
                <h6 style="margin: 0;">A.N SYAHBANDAR</h6>
                <h6 style="margin: 0;">SYAHBANDAR PEMBANTU PELABUHAN</h6>
                <h6 style="margin: 0;">PENYEBERANGAN GORONTALO</h6>
                <br /><br /><br />
                <h6 style="margin: 0;">SITTI CHADIDJAH LAHAMA, S.Kom</h6>
                <h6 style="margin: 0;">NIP. 19720415 200003 2 005</h6>
            </td>
        </tr>
    </table>

</body>

</html>
