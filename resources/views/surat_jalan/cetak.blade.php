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
        /* @media print {
            @page {
                size: landscape
            }
        } */

        @media print {
            @page {
                size: 13in 10.5in
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

        .p-10 {
            padding-top: 120px;
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
    <h4 class="text-center mb-0" style="font-weight: bold">SURAT JALAN</h4>
    <h5 class="text-center">DELIVERY ORDER (DO)</h5>

    <div class="d-flex justify-content-between">
        <div class="flex-item">
            <div class="d-flex">
                <div class="flex-item">
                    <p style="width: 130px">Nomor / <i>Number</i></p>
                </div>
                <div class="flex-item">
                    <p class="mx-4">:</p>
                </div>
                <div class="flex-item">
                    <p><b>{{ $suratjalan->no_sj }}</b></p>
                </div>
            </div>
            <div class="d-flex pt-0">
                <div class="flex-item">
                    <p style="width: 130px">Tanggal / <i>Date</i></p>
                </div>
                <div class="flex-item">
                    <p class="mx-4">:</p>
                </div>
                <div class="flex-item">
                    <p><b>{{ $suratjalan->tanggal_kirim }}</b></p>
                </div>
            </div>
            <div class="d-flex pt-0">
                <div class="flex-item">
                    <p style="width: 130px">Kepada Yth, / <i>To</i></p>
                </div>
                <div class="flex-item">
                    <p class="mx-4">:</p>
                </div>
                <div class="flex-item">
                    <p class="mb-0"><b>{{ $suratjalan->customer->name }}</b></p>
                    <p><b>{{ $suratjalan->customer->alamat }}</b></p>
                </div>
            </div>
            <div class="d-flex pt-0">
                <div class="flex-item">
                    <p style="width: 130px"><b>Contact Person</b></p>
                </div>
                <div class="flex-item">
                    <p class="mx-4">:</p>
                </div>
                <div class="flex-item">
                    <p class="mb-0"><b>{{ $suratjalan->customer->nama_contact }} :
                            {{ $suratjalan->customer->nomor_contact }}</b></p>
                </div>
            </div>
        </div>
        <div class="flex-item">
            <div class="d-flex">
                <div class="flex-item">
                    <p style="width: 130px">No. Pol</p>
                </div>
                <div class="flex-item">
                    <p class="mx-4">:</p>
                </div>
                <div class="flex-item">
                    <p><b>{{ $suratjalan->driver->truck->no_pol }}</b></p>
                </div>
            </div>
            <div class="d-flex">
                <div class="flex-item">
                    <p style="width: 130px">No. Sealed A</p>
                </div>
                <div class="flex-item">
                    <p class="mx-4">:</p>
                </div>
                <div class="flex-item">
                    <p><b>{{ $suratjalan->seal_a }}</b></p>
                </div>
            </div>
            <div class="d-flex">
                <div class="flex-item">
                    <p style="width: 130px">No. Sealed B</p>
                </div>
                <div class="flex-item">
                    <p class="mx-4">:</p>
                </div>
                <div class="flex-item">
                    <p><b>{{ $suratjalan->seal_b }}</b></p>
                </div>
            </div>
            <div class="d-flex">
                <div class="flex-item">
                    <p style="width: 130px">Jam Kirim</p>
                </div>
                <div class="flex-item">
                    <p class="mx-4">:</p>
                </div>
            </div>
            <div class="d-flex">
                <div class="flex-item">
                    <p style="width: 130px">Jam Bongkar</p>
                </div>
                <div class="flex-item">
                    <p class="mx-4">:</p>
                </div>
            </div>
        </div>
    </div>

    <table class="table table-bordered">
        <tr style="height: 30px">
            <th class="text-center">
                <h6 class="mb-0"><u>Nama Barang</u></h6>
                <h6 class="mb-0"><i>Name of Goods</i></h6>
            </th>
            <th class="text-center">
                <h6 class="mb-0"><u>Kwantitas</u></h6>
                <h6 class="mb-0"><i>Quantity</i></h6>
            </th>
            <th class="text-center">
                <h6 class="mb-0"><u>Satuan</u></h6>
                <h6 class="mb-0"><i>Set of</i></h6>
            </th>
            <th class="text-center">
                <h6>SG</h6>
            </th>
            <th class="text-center">
                <h6>SUHU</h6>
            </th>
        </tr>
        <tr style="height: 90px">
            <td></td>
            <td class="text-center"> {{ number_format($suratjalan->volume, 0, ',', '.') }}</td>
            <td class="text-center">LITER</td>
            <td colspan="2"></td>
        </tr>
    </table>

    <table class="table table-bordered">
        <tr style="height: 180px">
            <th class="text-center">
                <h6 class="p-10 mb-0"><u>Yang Menerima</u></h6>
                <h6 class="mb-0"><i>Accepted By</i></h6>
            </th>
            <th class="text-center">
                <h6 class="p-10 mb-0"><u>Mengetahui</u></h6>
                <h6 class="mb-0"><i>Alknowledge</i></h6>
            </th>
            <th class="text-center">
                <h6 class="p-10 mb-0"><u>Yang Menyerahkan</u></h6>
                <h6 class="mb-0"><i>Delivered by</i></h6>
            </th>
        </tr>
    </table>
    <div class="d-flex">
        <div class="flex-item" style="width: 700px">
            <p class="mb-0"><b>Perhatian :</b></p>
            <h6><b>Sebelum Barang diterima & dibongkar Harap BBM HSD diperiksa dengan teliti dan seksama, barang yang
                    sudah diterima tidak dapat dikembalikan / dikomplain dalam waktu 1 x 24 jam.</b>
            </h6>
            <h6 class="mb-0"><u><b>Diterima dalam keadaan cukup dan murni</b></u></h6>
            <h6><i><b>Accepted in good condition and enough</b></i></h6>
        </div>
        <div class="flex-item">
            <p style="margin-left: 90px"><b>Tinggi Cairan :</b></p>
        </div>
    </div>
    <h6 style="font-size: 0.7rem">Lembar 1 : Putih Finance GAB Lembar 2 : Merah Office GAB Lembar 3 : Kuning Transport
        Lembar 4 : Biru DEPO
        Lembar 5 : Hijau Customer Lembar 6 : Merah Customer Lembar 7 : Kuning Customer Lembar 8 : Hijau Staff
        Distribusi</h6>
    <script>
        print();
    </script>
</body>

</html>
