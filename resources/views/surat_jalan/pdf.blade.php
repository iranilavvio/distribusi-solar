<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Data Surat Jalan</title>
    <style>
        @media print {
            @page {
                size: landscape
            }
        }

        @print {
            @page :footer {
                display: none
            }

            @page :header {
                display: none
            }
        }

        .ttd {
            margin-top: 100px;
        }
    </style>
</head>

<body>
    <div class="d-flex justify-content-center">
        <div class="flex-item">
            <img src="{{ asset('assets/img/gab/gab.jpg') }}" alt="" width="70%">
        </div>
        <div class="flex-item text-center">
            <h1 class="" style="color: #8b0c0c; font-weight: 800;">PT. GLOBAL ARTA BORNEO</h1>
            <p class="mb-0">Office : Jl. H. Hasan Basri Komp. Ruko Kayutangi Blok C No. 5</p>
            <p>Banjarmasin Telp. (0511) 3308313 Fax. (0511) 3308413</p>
        </div>
    </div>
    <hr>
    <h4 class="text-center mb-4">LAPORAN DATA SURAT JALAN</h4>
    <table class="table table-bordered">
        <tr class="text-center">
            <th>No</th>
            <th>No Surat Jalan</th>
            <th>Tanggal Kirim</th>
            <th>No Kirim</th>
            <th>Driver</th>
            <th>Volume</th>
            <th>Customer</th>
            <th>Tujuan</th>
            <th>Seal A</th>
            <th>Seal B</th>
            <th>Petugas Catat</th>
        </tr>
        @foreach ($suratjalan as $sj)
            <tr>
                <th style="font-weight: normal" class="text-center">{{ $loop->iteration }}</th>
                <th style="font-weight: normal">{{ $sj->no_sj }}</th>
                <th style="font-weight: normal">{{ date('d/m/Y', strtotime($sj->tanggal_kirim)) }}</th>
                <th style="font-weight: normal">{{ $sj->no_kirim }}</th>
                <th style="font-weight: normal">{{ $sj->driver->karyawan->name }}</th>
                <th style="font-weight: normal">{{ $sj->volume }}</th>
                <th style="font-weight: normal">{{ $sj->customer->name }}</th>
                <th style="font-weight: normal">{{ $sj->kota_tujuan }}</th>
                <th style="font-weight: normal">{{ $sj->seal_a }}</th>
                <th style="font-weight: normal">{{ $sj->seal_b }}</th>
                <th style="font-weight: normal">{{ $sj->karyawan->name }}</th>
            </tr>
        @endforeach
    </table>
    <div class="d-flex justify-content-end mt-4" style="margin-right: 50px">
        <div class="flex-item mt-4">
            <p class="text-center mb-0">Mengetahui,</p>
            <p class="text-center">Manager PT. GLOBAL ARTA BORNEO</p>
            <p class="text-center ttd"> Abdul Muthalib</p>
        </div>
    </div>
    <script>
        print();
    </script>
</body>

</html>
