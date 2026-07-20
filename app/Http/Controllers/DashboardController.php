<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;
use App\Models\Boking;

class DashboardController extends Controller
{
    public function index()
    {
        $totalKamar = Kamar::count();
        $kamarTersedia = Kamar::where('status_kamar', 'tersedia')->count();
        $kamarTerisi = Kamar::where('status_kamar', 'terisi')->count();
        
        $totalBoking = Boking::count();
        $bokingPending = Boking::where('status_boking', 'pending')->count();
        
        // Mengambil 5 boking terbaru untuk ditampilkan di tabel ringkasan
        $bokingTerbaru = Boking::with(['kamar', 'user'])->latest()->take(5)->get();

        return view('dashboard', compact(
            'totalKamar',
            'kamarTersedia',
            'kamarTerisi',
            'totalBoking',
            'bokingPending',
            'bokingTerbaru'
        ));
    }
}
