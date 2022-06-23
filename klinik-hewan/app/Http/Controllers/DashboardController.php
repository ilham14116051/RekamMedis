<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\RekamMedis;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function index()
    {
        $rekamMedis = RekamMedis::count();
        $pasiens = Pasien::count();
        $total = Transaction::sum('total_invoice');

        return view('dashboard.data', compact('rekamMedis', 'pasiens','total'));
    }
}
