<?php

namespace App\Http\Controllers;

use App\Models\ControlDelivery;
use App\Models\Delivery;
use App\Models\Driver;
use App\Models\OrderReal;
use App\Models\Pendistribusian;
use App\Models\PurchaseOrder;
use App\Models\SuratJalan;
use App\Models\TandaTerima;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        //count driver
        $driver = Driver::count();
        //count purchase
        $purchase = PurchaseOrder::count();
        //count surat jalan
        $suratjalan = SuratJalan::count();
        //count order real
        $orderreal = OrderReal::count();
        //count pendistribusian
        $pendistribusian = Pendistribusian::count();
        //count delivery
        $delivery = Delivery::count();
        //count control delivery
        $control = ControlDelivery::count();
        //count tanda terima
        $tandaterima = TandaTerima::count();
        return view('dashboard', compact('driver', 'purchase', 'suratjalan', 'orderreal', 'pendistribusian', 'delivery', 'control', 'tandaterima'));
    }
}
