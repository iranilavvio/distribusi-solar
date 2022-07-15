<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Data Driver</title>
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
    <h4 class="text-center mt-4">LAPORAN DATA DRIVER</h4>
    <table class="table table-bordered mt-4">
        <tr class="text-center">
            <th>No</th>
            <th>Nama</th>
            <th>NIK</th>
            <th>Alamat</th>
            <th>Nomor Polisi</th>
            <th>No Lambung</th>
            <th>Kuantitas</th>
        </tr>
        @foreach ($driver as $item)
            <tr>
                <th style="font-weight: normal" class="text-center">{{ $loop->iteration }}</th>
                <th style="font-weight: normal">{{ $item->karyawan->name }}</th>
                <th style="font-weight: normal">{{ $item->karyawan->nik }}</th>
                <th style="font-weight: normal">{{ $item->karyawan->alamat }}</th>
                <th style="font-weight: normal">{{ $item->truck->no_pol }}</th>
                <th style="font-weight: normal">{{ $item->truck->no_lambung }}</th>
                <th style="font-weight: normal">{{ $item->truck->kuantitas }}</th>
            </tr>
        @endforeach
    </table>
    <script>
        print();
    </script>
</body>

</html>
