<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Order & Real</title>
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
    <h6><i>Date : {{ Carbon\Carbon::today()->format('d F Y') }}</i></h6>
    <h4 class="text-center mb-4">LAPORAN ORDER & REAL</h4>
    {{-- <p>Date : {{ Carbon::now() }}</p> --}}
    <table class="table table-bordered">
        <tr class="text-center">
            <th>No</th>
            <th>Perusahaan</th>
            <th>Alamat</th>
            <th>Receive PO</th>
            <th>Realisasi</th>
            <th>Unreal</th>
            <th>Keterangan</th>
        </tr>
        @foreach ($orderreal as $order)
            <tr>
                <th style="font-weight: normal" class="text-center">{{ $loop->iteration }}</th>
                <th style="font-weight: normal">{{ $order->customer->name }}</th>
                <th style="font-weight: normal">{{ $order->alamat }}</th>
                <th style="font-weight: normal">{{ number_format($order->receive_po, 0, ',', '.') }}</th>
                <th style="font-weight: normal">{{ number_format($order->realisasi, 0, ',', '.') }}</th>
                <th style="font-weight: normal">{{ number_format($order->unreal, 0, ',', '.') }}</th>
                <th style="font-weight: normal">{{ $order->keterangan }}</th>
            </tr>
        @endforeach
        <tr>
            <td colspan="3" class="text-center" style="font-weight: bold">Total Delivery</td>
            <td><b>{{ number_format($sum_receive_po, 0, ',', '.') }}</b></td>
            <td><b>{{ number_format($sum_realisasi, 0, ',', '.') }}</b></td>
            <td><b>{{ number_format($sum_unreal, 0, ',', '.') }}</b></td>
            <td></td>
        </tr>
    </table>
    <script>
        print();
    </script>
</body>

</html>
