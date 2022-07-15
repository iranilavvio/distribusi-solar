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
    <h3 class="text-center mb-4">LAPORAN ORDER & REAL</h3>
    <table class="table table-bordered">
        <tr class="text-center">
            <th>No</th>
            <th>No Order</th>
            <th>Customer</th>
            <th>Alamat</th>
            <th>Receive PO</th>
            <th>Realisasi</th>
            </th>
            <th>Unreal</th>
            <th>Keterangan</th>
        </tr>
        @foreach ($orderreal as $order)
            <tr>
                <th style="font-weight: normal" class="text-center">{{ $loop->iteration }}</th>
                <th style="font-weight: normal">{{ $order->no_order }}</th>
                <th style="font-weight: normal">{{ $order->customer->name }}</th>
                <th style="font-weight: normal">{{ $order->alamat }}</th>
                <th style="font-weight: normal">{{ $order->receive_po }}</th>
                <th style="font-weight: normal">{{ $order->realisasi }}</th>
                <th style="font-weight: normal">{{ $order->unreal }}</th>
                <th style="font-weight: normal">{{ $order->keterangan }}</th>
            </tr>
        @endforeach
    </table>
    <script>
        print();
    </script>
</body>

</html>
