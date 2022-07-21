<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Tanda Terima</title>
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
            margin-left: 30px;
            margin-right: 150px;
        }

        .ttd2 {
            margin-top: 130px;
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
    <h4 class="text-center mb-4">LAPORAN TANDA TERIMA SURAT JALAN</h4>
    <table class="table table-bordered">
        <tr class="text-center">
            <th>No</th>
            <th>Tanggal</th>
            <th>No Surat Jalan</th>
            <th>No Polisi</th>
            <th>Perusahaan</th>
            <th>Volume</th>
            <th>Keterangan</th>
        </tr>
        @foreach ($tandaterima as $tt)
            <tr>
                <th style="font-weight: normal" class="text-center">{{ $loop->iteration }}</th>
                <th style="font-weight: normal">{{ $tt->tanggal }}</th>
                <th style="font-weight: normal">{{ $tt->suratjalan->no_sj }}</th>
                <th style="font-weight: normal">{{ $tt->suratjalan->driver->truck->no_pol }}</th>
                <th style="font-weight: normal">{{ $tt->suratjalan->customer->name }}</th>
                <th style="font-weight: normal">{{ $tt->suratjalan->volume }}</th>
                <th style="font-weight: normal">{{ $tt->keterangan }}</th>
            </tr>
        @endforeach
    </table>
    <h6>Banjarmasin, {{ Carbon\Carbon::today()->format('d F Y') }}</h6><br>
    <h6 style="width: 600px; font-size: 0.9rem">Note : Apabila Dokumen Surat Jalan tersebut sudah diterima, mohon
        bantuannya agar tanda
        terima surat jalan tersebut dapat dikirimkan kembali ke kami by email.</h6>
    <div class="d-flex justify-content-between ttd mt-4">
        <div class="flex-item text-center">
            <h6>Dibuat Oleh :</h6>
            <h6 class="ttd2">{{ Auth::user()->name }}</h6>
        </div>
        <div class="flex-item text-center">
            <h6>Mengetahui </h6>
            <h6 class="ttd2">Mas Hafiz</h6>
        </div>
        <div class="flex-item text-center">
            <h6>Penerima</h6>
            <h6 class="ttd2">Mbak Vina</h6>
        </div>
    </div>
    <script>
        print();
    </script>
</body>

</html>
