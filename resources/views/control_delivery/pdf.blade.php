<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Data Control Delivery</title>
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
    <h4 class="text-center mb-4">LAPORAN DATA CONTROL DELIVERY</h4>
    <table class="table table-bordered">
        <tr class="text-center">
            <th>No</th>
            <th>Kode</th>
            <th>Jam Isi</th>
            <th>Jam Finish</th>
            <th>No Surat Jalan</th>
            <th>Customer</th>
            <th>Volume</th>
            <th>No Pol</th>
        </tr>
        @foreach ($control as $item)
            <tr>
                <th style="font-weight: normal" class="text-center">{{ $loop->iteration }}</th>
                <th style="font-weight: normal">{{ $item->kode }}</th>
                <th style="font-weight: normal">{{ $item->jam_isi }}</th>
                <th style="font-weight: normal">{{ $item->jam_finish }}</th>
                <th style="font-weight: normal">{{ $item->suratjalan->no_sj }}</th>
                <th style="font-weight: normal">{{ $item->suratjalan->customer->name }}</th>
                <th style="font-weight: normal">{{ number_format($item->suratjalan->volume, 0, ',', '.') }}</th>
                <th style="font-weight: normal">{{ $item->suratjalan->driver->truck->no_pol }}</th>
            </tr>
        @endforeach
        {{-- <tr>
            <td colspan="6">Total Delivery</td>
            <td>{{ $sum_volume }}</td>
        </tr> --}}
    </table>
    <script>
        print();
    </script>
</body>

</html>
