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
            margin-left: 50px;
            margin-right: 120px;
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
    <h5 class="text-center mb-0" style="font-weight: bold">TANDA TERIMA SURAT JALAN</h5>
    <h5 class="text-center">No. Surat Jalan : {{ $tandaterima->suratjalan->no_sj }}</h5>
    <p class="mt-4 pt-4">{{ date('l, d F Y', strtotime($tandaterima->tanggal)) }} Telah diterima Barang BBM Solar
        Industri
        Dari PT.
        Global Arta
        Borneo dengan detail sebagai berikut :</p>
    <div class="d-flex mt-4" style="margin-left: 30px;">
        <div class="flex-item" style="width: 120px">Tanggal Kirim</div>
        <div class="flex-item mx-4">:</div>
        <div class="flex-item"> {{ date('d M Y', strtotime($tandaterima->suratjalan->tanggal_kirim)) }}</div>
    </div>
    <div class="d-flex" style="margin-left: 30px;">
        <div class="flex-item" style="width: 120px">No. Kirim </div>
        <div class="flex-item mx-4">:</div>
        <div class="flex-item"> {{ $tandaterima->suratjalan->no_kirim }}</div>
    </div>
    <div class="d-flex" style="margin-left: 30px;">
        <div class="flex-item" style="width: 120px">Perusahaan </div>
        <div class="flex-item mx-4">:</div>
        <div class="flex-item"> {{ $tandaterima->suratjalan->customer->name }}</div>
    </div>
    <div class="d-flex" style="margin-left: 30px;">
        <div class="flex-item" style="width: 120px">Alamat </div>
        <div class="flex-item mx-4">:</div>
        <div class="flex-item"> {{ $tandaterima->suratjalan->customer->alamat }}</div>
    </div>
    <div class="d-flex" style="margin-left: 30px;">
        <div class="flex-item" style="width: 120px">Volume </div>
        <div class="flex-item mx-4">:</div>
        <div class="flex-item"> {{ number_format($tandaterima->suratjalan->volume, 0, ',', '.') }} LITER</div>
    </div>
    <p class="mt-4">Barang tersebut telah diterima dalam keadaan baik dan sudah dilakukan pemeriksaan untuk
        selanjutnya dipergunakan
        sebagai keperluan Customer.</p>
    <div class="d-flex justify-content-between ttd mt-4">
        <div class="flex-item text-center">
            <h6>Pengirim </h6>
            <h6 class="ttd2">( _______________________ )</h6>
        </div>
        <div class="flex-item text-center">
            <h6>Penerima</h6>
            <h6 class="ttd2">( _______________________ )</h6>
        </div>
    </div>
    <script>
        print();
    </script>
</body>

</html>
